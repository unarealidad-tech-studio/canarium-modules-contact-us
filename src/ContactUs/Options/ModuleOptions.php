<?php

namespace ContactUs\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
    protected $email_sender = array(
        'email' => 'info@unarealidad.com',
        'name'  => 'UNA REALIDAD'
    );

    protected $email_admin = 'errol.zuniga@unarealidad.com';

    protected $email_subject = 'Thank you';

    protected $email_admin_subject = 'Contact Us';

    public function setEmailSender($sender_info)
    {
        $this->email_sender = $sender_info;
        return $this;
    }

    public function getEmailSender()
    {
        return $this->email_sender;
    }

    public function setEmailAdmin($email_admin)
    {
        $this->email_admin = $email_admin;
        return $this;
    }

    public function getEmailAdmin()
    {
        return $this->email_admin;
    }

    public function setEmailSubject($email_subject)
    {
        $this->email_subject = $email_subject;
        return $this;
    }

    public function getEmailSubject()
    {
        return $this->email_subject;
    }

    public function setEmailAdminSubject($email_admin_subject)
    {
        $this->email_admin_subject = $email_admin_subject;
        return $this;
    }

    public function getEmailAdminSubject()
    {
        return $this->email_admin_subject;
    }

}
