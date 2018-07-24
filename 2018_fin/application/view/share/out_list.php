
                        <li>
                            <a href="/member"><i class="fa fa-user fa-fw"></i> 회원관리</a>
                        </li>
                        <li>
                            <a href="/file"><i class="fa fa-file fa-fw"></i> 파일관리</a>
                        </li>
                        <li>
                            <a href="#" class="active"><i class="fa fa-list fa-fw"></i> 공유관리<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/share/in_list">내부공유 목록</a>
                                </li>
                                <li>
                                    <a href="/share/out_list" class="active">외부공유 목록</a>
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
                        <h1 class="page-header">외부 공유 목록</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">외부 공유 리스트</div>
                        <!-- /.panel-heading -->
                    <form action="" method="post">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="table" value="in_list">
                        <div class="panel-body">
                            <div class="right">
                                <button type="submit" class="btn btn-primary">공유삭제</button>
                            </div>
                             <div class="left">
                                전체 <b><?php echo $allShare ?></b>건 공유 중 <b><?php echo $myShare ?></b>건 공유 중
                            </div>
                            <br />
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <colgroup>
                                        <col width="5%" />
                                        <col width="*" />
                                        <col width="10%" />
                                        <col width="10%" />
                                        <col width="10%" />
                                        <col width="10%" />
                                        <col width="30%" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th class="center"><input type="checkbox" name="allChk" class="allChk" /></th>
                                            <th class="center">파일명</th>
                                            <th class="center">파일용량</th>
                                            <th class="center">공유자</th>
                                            <th class="center">공유일</th>
                                            <th class="center">다운로드 횟수</th>
                                            <th class="center">다운로드주소</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php foreach ($list as $data) { ?>
                                        <tr>
                                            <td class="center"><?php if($is_member && $memberInfo->idx == $data->midx){ ?><input type="checkbox" name="idx[]" class="chk" value="<?php echo $data->idx ?>" /><?php } ?></td>
                                            <td><a href="/?q=<?php echo $data->ukey ?>"><?php echo $data->file_name ?></a></td>
                                            <td class="right"><?php echo getMb($data->file_size) ?></td>
                                            <td class="center"><?php echo $data->name ?>(<?php echo $data->id ?>)</td>
                                            <td class="center"><?php echo $data->s_date ?></td>
                                            <td class="center"><?php echo $data->down ?></td>
                                            <td class="left">
                                               <a href="/?q=<?php echo $data->ukey ?>">  
                                                <?php
                                                    echo $_SERVER['REQUEST_SCHEME']."://"; 
                                                    echo $_SERVER['HTTP_HOST'];
                                                    echo "/?q=".$data->ukey; 
                                                ?>
                                               </a>
                                            </td>
                                        </tr>
                                <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                    </form>
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
