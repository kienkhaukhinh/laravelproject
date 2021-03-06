@extends('admin.master')
@section('content')
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Tên đăng nhập</th>
                                <th>Cấp bậc</th>
                                <th>Ngày tạo</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $stt=0?>

                        @foreach($user as $item_user)
                        <?php $stt=$stt+1 ?>
                            <tr class="odd gradeX" align="center">
                                <td>{!! $stt !!}</td>
                                <td>{!!  $item_user["hoten"] !!}</td>
                                <td>{!!  $item_user["username"] !!}</td>
                                <td>
                                    @if($item_user["id"]==1)
                                        Superadmin
                                    @elseif($item_user["level"]==1)
                                        Admin
                                    @else
                                        Member
                                    @endif
                                </td>
                                <td>{!! \Carbon\Carbon::createFromTimeStamp(strtotime($item_user["created_at"]))->diffForHumans() !!}</td>
                                <td>{!!  $item_user["email"] !!}</td>
                                <td>{!!  $item_user["sdt"] !!}</td>
                                <td>{!!  $item_user["diachi"] !!}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Bạn có chắc muốn xóa ?')" href="{!! URL::route('admin.user.getDelete',$item_user['id']) !!}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.user.getEdit',$item_user['id']) !!}">Sửa</a></td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
@stop