
                        <li>
                            <a href="/member" class="active"><i class="fa fa-user fa-fw"></i> 회원관리</a>
                        </li>
                        <li>
                            <a href="/file"><i class="fa fa-file fa-fw"></i> 파일관리</a>
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
                        <h1 class="page-header">회원관리</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">회원리스트</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="right">
                                <button type="button" class="btn btn-primary" onclick="location.replace('/member/insert');">회원추가</button>
                            </div>
                            <br />
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <colgroup>
                                        <col width="8%" />
                                        <col width="12%" />
                                        <col width="12%" />
                                        <col width="12%" />
                                        <col width="*" />
                                        <col width="10%" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th class="center">순번</th>
                                            <th class="center">아이디</th>
                                            <th class="center">이름</th>
                                            <th class="center">회원구분</th>
                                            <th class="center">암호(SHA256+SALT)</th>
                                            <th class="center">기능</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php foreach ($list as $data) { ?>
                                        <tr>
                                            <td class="center"><?php echo $data->idx ?></td>
                                            <td><?php echo $data->id ?></td>
                                            <td><?php echo $data->name ?></td>
                                            <td class="center"><?php echo $data->level == 10 ? "관리자" : "사용자" ?></td>
                                            <td><?php echo $data->pw ?></td>
                                            <td class="center">
                                                <button type="button" class="btn btn-info btn-xs" onclick="location.replace('/member/update/<?php echo $data->idx ?>')">수정</button>
                                                <button type="button" class="btn btn-info btn-xs" onclick="if(!confirm('회원을 삭제하시겠습니까?')) return false; location.replace('/member/delete/<?php echo $data->idx ?>')">삭제</button>
                                            </td>
                                        </tr>
                                <?php } ?>
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
