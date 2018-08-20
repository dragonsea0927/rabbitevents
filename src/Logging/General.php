<?php

namespace Nuwber\Events\Logging;

use Nuwber\Events\Job;

class General extends Writer
{
    /**
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $laravel;

    public function __construct($laravel)
    {
        $this->laravel = $laravel;
    }

    /**
     * @inheritdoc
     */
    public function log($event)
    {
        $status = $this->getStatus($event);
        $level = $status != self::STATUS_FAILED ?
            $this->laravel['config']->get('queue.connections.interop.logging.level', 'info') :
            'error';

        $this->write($event->job, $status, $level);
    }

    protected function write(Job $job, $status, $level)
    {
        $this->laravel['log']->log($level, sprintf('Job "%s" %s', $job->getName(), $status), [
            'job' => [
                'payload' => $job->payload(),
                'name' => $job->getName(),
                'connection' => $job->getConnectionName(),
                'attempts' => $job->attempts(),
            ],
            'status' => $status,
        ]);
    }
}
