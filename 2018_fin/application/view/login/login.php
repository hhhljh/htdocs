

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">웹하드 로그인 정보</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <input type="hidden" name="action" value="login">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="아이디" name="id" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="암호" name="pw" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">아이디 저장
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">로그인</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
