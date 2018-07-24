

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

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">수정</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <input type="hidden" name="action" value="update">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="이름" name="name" type="text" value="<?php echo $data->name ?>" autofocus>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">확인</button>
                                <button type="button" onclick="location.replace('/file?parent=<?php echo $_GET['parent'] ?>')" class="btn btn-lg btn-success btn-block">취소</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
