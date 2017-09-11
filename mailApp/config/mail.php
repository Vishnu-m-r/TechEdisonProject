<?php
return [ 
        
        'driver' => 'smtp',
        
        'host' => 'smtp.sendgrid.net',
        
        'port' => 587,
        
            'encryption' => 'tls', 
        
        'username' => 'myApi',
        
        'password' => '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',
        
        'sendmail' => '/usr/sbin/sendmail -bs' 
];