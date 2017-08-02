@extends('admin.master')
@section('content')
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        {!! $id=1 !!}
                            @foreach($data as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{!! $id++ !!}</td>
                                <td>{!! $item->name !!}</td>
                                <td>{!! number_format($item->price,0,",",".") !!} VNĐ</td>
                                <td>{!! \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() !!}</td>
                                <td>
                                    @if($item->cate_id==0)
                                        {!! None !!}
                                    @else
                                        <?php $cate=DB::table('cates')->where('id',$item->cate_id)->first(); ?>
                                        {!! $cate->name !!}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Bạn có chắc muốn xóa ?')" href="{!! URL::route('admin.product.getDelete',$item->id) !!}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.product.getEdit',$item->id) !!}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
@stop