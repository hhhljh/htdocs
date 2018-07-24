                        <li>
                            <a href="/member"><i class="fa fa-user fa-fw"></i> 회원관리</a>
                        </li>
                        <li>
                            <a href="/file" class="active"><i class="fa fa-file fa-fw"></i> 파일관리</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list fa-fw"></i> 공유관리<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/share/in_list">내부공유 목록</a>
                                </li>
                                <li>
                                    <a href="/share/out_list">외부공유 목록</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">파일관리</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">파일/폴더리스트</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="right">
                                <button type="button" class="btn btn-primary" onclick="location.replace('/file/dirInsert?parent=<?php echo $parent ?>')">디렉토리 생성</button>
                                <button type="button" class="btn btn-primary" onclick="location.replace('/file/upload?parent=<?php echo $parent ?>')">파일 업로드</button>
                            </div>
                            <div class="left">
                                위치 : /
                            </div>
                            <br />
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <colgroup>
                                        <col width="*" />
                                        <col width="10%" />
                                        <col width="10%" />
                                        <col width="10%" />
                                        <col width="10%" />
                                        <col width="15%" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th class="center">파일/디렉토리명</th>
                                            <th class="center">크기</th>
                                            <th class="center">종류</th>
                                            <th class="center">생성일</th>
                                            <th class="center">수정일</th>
                                            <th class="center">기능</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php if($parent != 0) { ?>
                                        <tr>
                                            <td><a href="/file?parent=<?php echo $upParent ?>">..</a></td>
                                            <td class="center">-</td>
                                            <td class="center">상위</td>
                                            <td class="center">-</td>
                                            <td class="center">-</td>
                                            <td class="center">
                                                
                                            </td>
                                        </tr>
                                <?php }
                                    foreach ($list as $data) {
                                        if ($data->type == 'folder') { ?>
                                        <tr>
                                            <td><a href="/file?parent=<?php echo $data->idx ?>"><?php echo $data->name ?></a></td>
                                            <td class="center">-</td>
                                            <td class="center">디렉토리</td>
                                            <td class="center"><?php echo $data->mdate ?></td>
                                            <td class="center"><?php echo $data->cdate ?></td>
                                            <td class="center">
                                                <button type="button" class="btn btn-info btn-xs" onclick="location.replace('/file/update/<?php echo $data->idx ?>?parent=<?php echo $parent ?>')">수정</button>
                                                <button type="button" class="btn btn-danger btn-xs" onclick="location.replace('/file/delete/<?php echo $data->idx ?>?type=folder&amp;parent=<?php echo $parent ?>')">삭제</button>
                                            </td>
                                        </tr>
                                  <?php } else{ ?>
                                        <tr>
                                            <td><a href="/file/down/<?php echo $data->idx ?>"><?php echo $data->name ?></a></td>
                                            <td class="center"><?php echo getMb($data->size) ?></td>
                                            <td class="center">파일</td>
                                            <td class="center"><?php echo $data->mdate ?></td>
                                            <td class="center"><?php echo $data->cdate ?></td>
                                            <td class="center">
                                                <button type="button" class="btn btn-info btn-xs" onclick="if(!confirm('내부인원에게 공유하시겠습니까?')) return false; location.replace('/share/inInsert/<?php echo $data->idx ?>?parent=<?php echo $parent ?>')">내부공유</button>
                                                <button type="button" class="btn btn-info btn-xs" onclick="location.replace('/share/outInsert/<?php echo $data->idx ?>?parent=<?php echo $parent ?>')">외부공유</button>
                                                <button type="button" class="btn btn-danger btn-xs" onclick="location.replace('/file/delete/<?php echo $data->idx ?>?type=file&amp;parent=<?php echo $parent ?>')">삭제</button>
                                            </td>
                                        </tr>
                                    <?php }
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
