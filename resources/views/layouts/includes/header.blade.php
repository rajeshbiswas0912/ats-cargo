<header class="header-desktop">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="header-wrap">
        <form class="form-header" action="" method="POST">
        </form>
        <div class="header-button">
          <div class="account-wrap">
            <div class="account-item clearfix js-item-menu">
              <div class="image">
                <img src="images/no-image.png" alt="John Doe" />
              </div>
              <div class="content">
                <a class="js-acc-btn" href="#">ATS Cargo</a>
              </div>
              <div class="account-dropdown js-dropdown">
                <div class="info clearfix">
                  <div class="image">
                    <a href="#">
                      <img src="images/no-image.png" alt="John Doe" />
                    </a>
                  </div>
                  <div class="content">
                    <h5 class="name">
                      <a href="#">ATS Cargo</a>
                    </h5>
                    {{-- <span class="email">ATS Cargo</span> --}}
                  </div>
                </div>
                {{-- <div class="account-dropdown__body">
                  <div class="account-dropdown__item">
                    <a href="#">
                      <i class="zmdi zmdi-account"></i>Account</a>
                  </div>
                  <div class="account-dropdown__item">
                    <a href="#">
                      <i class="zmdi zmdi-settings"></i>Setting</a>
                  </div>
                  <div class="account-dropdown__item">
                    <a href="#">
                      <i class="zmdi zmdi-money-box"></i>Billing</a>
                  </div>
                </div> --}}
                <div class="account-dropdown__footer">
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                      <i class="zmdi zmdi-power"></i>Logout</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
