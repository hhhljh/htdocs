

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

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">회원 추가</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <input type="hidden" name="action" value="insert">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="이름" name="name" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="아이디" name="id" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="암호" name="pw" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="회원구분(관리자,일반회원)" name="level" type="text" autofocus>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">아이디 저장
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">확인</button>
                                <button type="button" onclick="location.replace('/member')" class="btn btn-lg btn-success btn-block">취소</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
