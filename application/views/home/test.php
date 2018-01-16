<?php
echo constant('PERMISSION_READ').' and ';

if(16&constant('PERMISSION_SYSTEM'))
{
    echo constant('PERMISSION_SYSTEM');
}