<?php

namespace Weboptic\Notifications;

use Illuminate\Session\Store;

class FlashNotifier
{
    protected Store $session;

    protected array $notifies = [];
    
    public function __construct(Store $session)
    {
        $this->session = $session;
    }
    
    public function info(string $message, string $title = ''): self
    {
        return $this->message('info', $message, $title);
    }
    
    public function success(string $message, string $title = ''): self
    {
        return $this->message('success', $message, $title);
    }
    
    public function warning(string $message, string $title = ''): self
    {
        return $this->message('warning', $message, $title);
    }
    
    public function error(string $message, string $title = ''): self
    {
        return $this->message('danger', $message, $title);
    }
    
    protected function push(): void
    {
        $this->session->flash('flash.alerts', $this->notifies);
    }
    
    protected function message(string $level, string $message, string $title = ''): self
    {
        $this->notifies[] = ['title' => $title, 'message' => $message, 'level' => $level];

        $this->push();

        return $this;
    }
}
