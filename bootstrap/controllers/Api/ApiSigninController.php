<?php 

namespace Bootstrap\Controllers\Api;
use Bootstrap\Models\User;
use Bootstrap\Controllers\Controller;

class ApiSigninController extends Controller
{
  

    public function postSignin($request,$response,$args)
    {
            $result=(object)['status'=>'failed',
                    'err'=>'No credentials macthed'];
            $auth=$this->container->auth->attempt($request->getParams());
            if ($auth)
            {
                $result->status='ok';
                $result->err='None';
            }

            return json_encode($result);
    } 
}
