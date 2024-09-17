<?php

namespace App\Enums;
    
    enum Role:int 
    {
        case SUPER_ADMINISTRATOR = 1;
        case ADMINISTRATOR = 2;
        case CLIENT = 3;
    }