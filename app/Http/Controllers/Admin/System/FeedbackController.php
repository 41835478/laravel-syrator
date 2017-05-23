<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Admin\BackController;
use Zizaco\Entrust\EntrustFacade as Entrust;

use Illuminate\Http\Request;
use App\Repositories\FeedbackRepository;

/**
 * 前台模板控制器
 *
 */
class FeedbackController extends BackController
{
    protected $repository;
    
    public function __construct(FeedbackRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    
        if(!Entrust::can('admin.system.feedback')) {
            $this->middleware('deny');
        }
    }

    public function index(Request $request)
    {
        if(!Entrust::can('admin.system.feedback')) {
            return deny();
        }
        
        $list = $this->repository->index();
        return $this->view('system.feedback.index', compact('list'));
    }
    
    public function show($id)
    {
        if(!Entrust::can('admin.system.feedback.show')) {
            return deny();
        }
        
        $entity = $this->repository->edit($id);
        $imageTemp = explode(';',$entity->images_urls);
        $imageList = array();
        foreach ($imageTemp as $val) {
            if(!empty($val)) {
                $imageList[] = $val;
            }            
        }
        
        $countList = count($imageList);
        return $this->view('system.feedback.show', compact('entity','imageList','countList'));
    }
    
    public function reply(Request $request)
    {
        if(!Entrust::can('admin.system.feedback.reply')) {
            return deny();
        }
        
        $data = $request->all();
        $data['reply_user_id'] = auth()->user()->id;
        $this->repository->reply($data['entity_id'], $data);
    
        return redirect()->to(site_path('system/feedback', 'admin'))->with('message', '回复成功！');
    }
}
