<footer id="footer" class="footer light-background">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                    <span class="sitename">Medilab</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>Số 1, Nguyễn Văn Cừ</p>
                    <p>Hà Nội, Việt Nam</p>
                    <p class="mt-3"><strong>Điện thoại:</strong> <span>+84 123 456 789</span></p>
                    <p><strong>Email:</strong> <span>lienhe@medilab.com</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Liên kết hữu ích</h4>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Dịch vụ</a></li>
                    <li><a href="#">Điều khoản sử dụng</a></li>
                    <li><a href="#">Chính sách bảo mật</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Dịch vụ của chúng tôi</h4>
                <ul>
                    <li><a href="#">Khám tổng quát</a></li>
                    <li><a href="#">Khám chuyên khoa</a></li>
                    <li><a href="#">Xét nghiệm</a></li>
                    <li><a href="#">Điều trị</a></li>
                    <li><a href="#">Tư vấn sức khỏe</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Thông tin khác</h4>
                <ul>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Câu hỏi thường gặp</a></li>
                    <li><a href="#">Tuyển dụng</a></li>
                    <li><a href="#">Hợp tác</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Bản quyền</span> <strong class="px-1 sitename">Medilab</strong> <span>Đã đăng ký</span></p>
        <div class="credits">
            Thiết kế bởi <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer>

<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const headerOffset = document.querySelector('.header').offsetHeight;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
</script>