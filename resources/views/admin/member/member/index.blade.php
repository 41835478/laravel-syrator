@extends('_layout._admin')

@section('head_css_page_level')
@parent
<link href="{{ _asset('assets/metronic/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/metronic/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('head_style')
@parent
@stop

@section('page-content-bar')
@parent
<ul class="page-breadcrumb">
    <li>
        <a href="{{ site_url('home', 'admin') }}">首页</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="{{ site_url('member/member', 'admin') }}">会员管理</a>
        <i class="fa fa-circle"></i>
    </li>
</ul>
@stop

@section('page-content-title')
@parent
<h1 class="page-title"> 会员列表</h1>
@stop

@section('page-content-row')
@parent
<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <button id="sample_editable_1_new" class="btn green"> Add New
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group pull-right">
                                <button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;"> Print </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"> Save as PDF </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"> Export to Excel </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th> Username </th>
                            <th> Full Name </th>
                            <th> Points </th>
                            <th> Notes </th>
                            <th> Edit </th>
                            <th> Delete </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> alex </td>
                            <td> Alex Nilson </td>
                            <td> 1234 </td>
                            <td class="center"> power user </td>
                            <td>
                                <a class="edit" href="javascript:;"> Edit </a>
                            </td>
                            <td>
                                <a class="delete" href="javascript:;"> Delete </a>
                            </td>
                        </tr>
                        <tr>
                            <td> lisa </td>
                            <td> Lisa Wong </td>
                            <td> 434 </td>
                            <td class="center"> new user </td>
                            <td>
                                <a class="edit" href="javascript:;"> Edit </a>
                            </td>
                            <td>
                                <a class="delete" href="javascript:;"> Delete </a>
                            </td>
                        </tr>
                        <tr>
                            <td> nick12 </td>
                            <td> Nick Roberts </td>
                            <td> 232 </td>
                            <td class="center"> power user </td>
                            <td>
                                <a class="edit" href="javascript:;"> Edit </a>
                            </td>
                            <td>
                                <a class="delete" href="javascript:;"> Delete </a>
                            </td>
                        </tr>
                        <tr>
                            <td> goldweb </td>
                            <td> Sergio Jackson </td>
                            <td> 132 </td>
                            <td class="center"> elite user </td>
                            <td>
                                <a class="edit" href="javascript:;"> Edit </a>
                            </td>
                            <td>
                                <a class="delete" href="javascript:;"> Delete </a>
                            </td>
                        </tr>
                        <tr>
                            <td> alex </td>
                            <td> Alex Nilson </td>
                            <td> 1234 </td>
                            <td class="center"> power user </td>
                            <td>
                                <a class="edit" href="javascript:;"> Edit </a>
                            </td>
                            <td>
                                <a class="delete" href="javascript:;"> Delete </a>
                            </td>
                        </tr>
                        <tr>
                            <td> webriver </td>
                            <td> Antonio Sanches </td>
                            <td> 462 </td>
                            <td class="center"> new user </td>
                            <td>
                                <a class="edit" href="javascript:;"> Edit </a>
                            </td>
                            <td>
                                <a class="delete" href="javascript:;"> Delete </a>
                            </td>
                        </tr>
                        <tr>
                            <td> gist124 </td>
                            <td> Nick Roberts </td>
                            <td> 62 </td>
                            <td class="center"> new user </td>
                            <td>
                                <a class="edit" href="javascript:;"> Edit </a>
                            </td>
                            <td>
                                <a class="delete" href="javascript:;"> Delete </a>
                            </td>
                        </tr>
                        <tr>
                            <td> alex </td>
                            <td> Alex Nilson </td>
                            <td> 1234 </td>
                            <td class="center"> power user </td>
                            <td>
                                <a class="edit" href="javascript:;"> Edit </a>
                            </td>
                            <td>
                                <a class="delete" href="javascript:;"> Delete </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop