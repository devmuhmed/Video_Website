<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\BackEnd\BackEndController;
use App\Models\Contact;

class ContactController extends BackEndController
{
    public function __construct(Contact $model)
    {
        parent::__construct($model);
    }
}
