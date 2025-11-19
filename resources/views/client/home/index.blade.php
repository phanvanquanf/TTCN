@extends('client.layouts.app')
@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section light-background">
            <img src="{{ asset(path: 'client/assets/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

            <div class="container position-relative">

                <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
                    <h2>CHÀO MỪNG ĐẾN VỚI MEDILAB</h2>
                    <p>Chúng tôi là đội ngũ giàu kinh nghiệm, mang đến giải pháp y tế hiện đại</p>
                </div><!-- End Welcome -->

                <div class="content row gy-4">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
                            <h3>Tại sao chọn Medilab?</h3>
                            <p>
                                Medilab cung cấp dịch vụ y tế chất lượng cao, đội ngũ bác sĩ chuyên nghiệp,
                                trang thiết bị hiện đại và môi trường thân thiện. Sức khỏe của bạn là ưu tiên hàng đầu của
                                chúng tôi.
                            </p>
                            <div class="text-center">
                                <a href="#about" class="more-btn"><span>Tìm hiểu thêm</span> <i
                                        class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Why Box -->

                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="row gy-4">

                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                                        <i class="bi bi-clipboard-data"></i>
                                        <h4>Hồ sơ sức khỏe điện tử</h4>
                                        <p>Quản lý hồ sơ khám chữa bệnh của bệnh nhân nhanh chóng và chính xác.</p>
                                    </div>
                                </div><!-- End Icon Box -->

                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                                        <i class="bi bi-gem"></i>
                                        <h4>Dịch vụ chất lượng cao</h4>
                                        <p>Đảm bảo quy trình y tế chuyên nghiệp, an toàn và hiệu quả cho bệnh nhân.</p>
                                    </div>
                                </div><!-- End Icon Box -->

                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                                        <i class="bi bi-inboxes"></i>
                                        <h4>Hệ thống quản lý hiện đại</h4>
                                        <p>Tích hợp công nghệ vào quy trình khám chữa bệnh, tiết kiệm thời gian và chi phí.
                                        </p>
                                    </div>
                                </div><!-- End Icon Box -->

                            </div>
                        </div>
                    </div>
                </div><!-- End  Content-->

            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row gy-4 gx-5">

                    <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
                        <img src="{{ asset(path: 'client/assets/img/about.jpg') }}" class="img-fluid" alt="">
                        <a href="https://www.youtube.com/watch?v=N76Vc44Z1mE" class="glightbox pulsating-play-btn"></a>
                    </div>

                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <h3>Về chúng tôi</h3>
                        <p>
                            Medilab cam kết mang đến dịch vụ y tế toàn diện, chất lượng cao cho cộng đồng.
                            Chúng tôi luôn cập nhật công nghệ mới, kết hợp cùng đội ngũ y bác sĩ tận tâm để chăm sóc sức
                            khỏe của bạn.
                        </p>
                        <ul>
                            <li>
                                <i class="fa-solid fa-vial-circle-check"></i>
                                <div>
                                    <h5>Xét nghiệm nhanh chóng, chính xác</h5>
                                    <p>Cung cấp kết quả kịp thời, hỗ trợ bác sĩ chẩn đoán hiệu quả.</p>
                                </div>
                            </li>
                            <li>
                                <i class="fa-solid fa-pump-medical"></i>
                                <div>
                                    <h5>Thiết bị y tế hiện đại</h5>
                                    <p>Ứng dụng công nghệ tiên tiến vào chẩn đoán và điều trị.</p>
                                </div>
                            </li>
                            <li>
                                <i class="fa-solid fa-heart-circle-xmark"></i>
                                <div>
                                    <h5>Chăm sóc tận tình</h5>
                                    <p>Đặt sức khỏe và sự an tâm của bệnh nhân làm ưu tiên số một.</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section light-background">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="fa-solid fa-user-doctor"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Bác sĩ</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="fa-regular fa-hospital"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Khoa chuyên môn</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="fas fa-flask"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Phòng thí nghiệm</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="fas fa-award"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Giải thưởng</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <div class="container section-title" data-aos="fade-up">
                <h2>Dịch vụ</h2>
                <p>Chúng tôi mang đến giải pháp y tế đa dạng, phù hợp với nhu cầu của mọi khách hàng</p>
            </div>

            <div class="container">
                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="fas fa-heartbeat"></i></div>
                            <h3>Khám sức khỏe tổng quát</h3>
                            <p>Đánh giá tình trạng sức khỏe toàn diện, phát hiện sớm bệnh lý tiềm ẩn.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="fas fa-pills"></i></div>
                            <h3>Cung cấp thuốc</h3>
                            <p>Đảm bảo thuốc đạt chuẩn, kê đơn chính xác theo tình trạng bệnh nhân.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="fas fa-hospital-user"></i></div>
                            <h3>Khám chuyên khoa</h3>
                            <p>Đội ngũ bác sĩ nhiều kinh nghiệm trong các lĩnh vực tim mạch, thần kinh, nhi, mắt…</p>
                        </div>
                    </div>

                </div>
            </div>
        </section><!-- /Services Section -->

        <!-- Departments Section -->
        <section id="departments" class="departments section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Các Khoa Phòng</h2>
                <p>Các dịch vụ và chuyên khoa mà phòng khám chúng tôi cung cấp cho bệnh nhân</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#departments-tab-1">Tim Mạch</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-2">Thần Kinh</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-3">Gan Mật</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-4">Nhi Khoa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-5">Mắt</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            <!-- Tab 1 -->
                            <div class="tab-pane active show" id="departments-tab-1">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Tim Mạch</h3>
                                        <p class="fst-italic">Chuyên chăm sóc và điều trị các bệnh về tim mạch.</p>
                                        <p>Chúng tôi đảm bảo chẩn đoán chính xác, điều trị hiệu quả và theo dõi liên tục các
                                            bệnh nhân tim mạch. Đội ngũ bác sĩ và nhân viên y tế phối hợp chặt chẽ để cung
                                            cấp dịch vụ tốt nhất.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{ asset('client/assets/img/departments-1.jpg') }}" alt="Tim Mạch"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>

                            <!-- Tab 2 -->
                            <div class="tab-pane" id="departments-tab-2">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Thần Kinh</h3>
                                        <p class="fst-italic">Khám và điều trị các bệnh lý về thần kinh.</p>
                                        <p>Khoa thần kinh cung cấp dịch vụ chẩn đoán và điều trị cho nhiều loại bệnh thần
                                            kinh, với kế hoạch chăm sóc cá nhân hóa cho từng bệnh nhân.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{ asset('client/assets/img/departments-2.jpg') }}" alt="Thần Kinh"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>

                            <!-- Tab 3 -->
                            <div class="tab-pane" id="departments-tab-3">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Gan Mật</h3>
                                        <p class="fst-italic">Chăm sóc và điều trị các bệnh về gan và mật.</p>
                                        <p>Chúng tôi cung cấp dịch vụ chẩn đoán và điều trị bệnh gan cấp tính và mãn tính,
                                            đảm bảo kết quả xét nghiệm chính xác và phương pháp điều trị phù hợp.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{ asset('client/assets/img/departments-3.jpg') }}" alt="Gan Mật"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>

                            <!-- Tab 4 -->
                            <div class="tab-pane" id="departments-tab-4">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Nhi Khoa</h3>
                                        <p class="fst-italic">Chăm sóc sức khỏe cho trẻ em từ sơ sinh đến thanh thiếu niên.
                                        </p>
                                        <p>Khoa Nhi cung cấp khám bệnh, tư vấn và điều trị, đảm bảo trẻ phát triển khỏe mạnh
                                            với đội ngũ bác sĩ giàu kinh nghiệm và tận tâm.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{ asset('client/assets/img/departments-4.jpg') }}" alt="Nhi Khoa"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>

                            <!-- Tab 5 -->
                            <div class="tab-pane" id="departments-tab-5">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Mắt</h3>
                                        <p class="fst-italic">Khám và điều trị các bệnh về mắt.</p>
                                        <p>Khoa mắt cung cấp dịch vụ khám, tư vấn và phẫu thuật mắt với thiết bị hiện đại và
                                            đội ngũ chuyên môn cao, giúp bảo vệ và cải thiện thị lực cho bệnh nhân.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{ asset('client/assets/img/departments-5.jpg') }}" alt="Mắt"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Departments Section -->


        <!-- Appointment Section -->
        <section id="appointment" class="appointment section">

            <div class="container section-title" data-aos="fade-up">
                <h2>Đặt lịch hẹn</h2>
                <p>Đặt lịch trực tuyến nhanh chóng, tiện lợi, tiết kiệm thời gian cho bệnh nhân</p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <form action="forms/appointment.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Họ và tên" required>
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Số điện thoại"
                                required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group mt-3">
                            <input type="datetime-local" name="date" class="form-control datepicker" id="date" required>
                        </div>
                        <div class="col-md-4 form-group mt-3">
                            <select name="department" id="department" class="form-select" required>
                                <option value="">Chọn khoa</option>
                                <option value="Tim mạch">Tim mạch</option>
                                <option value="Thần kinh">Thần kinh</option>
                                <option value="Nhi khoa">Nhi khoa</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group mt-3">
                            <select name="doctor" id="doctor" class="form-select" required>
                                <option value="">Chọn bác sĩ</option>
                                <option value="Bác sĩ A">Bác sĩ A</option>
                                <option value="Bác sĩ B">Bác sĩ B</option>
                                <option value="Bác sĩ C">Bác sĩ C</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Ghi chú (tùy chọn)"></textarea>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit">Đặt lịch</button>
                    </div>
                </form>
            </div>
        </section><!-- /Appointment Section -->

        <!-- Faq Section -->
        <section id="faq" class="faq section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Câu Hỏi Thường Gặp</h2>
                <p>Những câu hỏi phổ biến mà khách hàng thường quan tâm về dịch vụ và quy trình của chúng tôi</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

                        <div class="faq-container">

                            <div class="faq-item faq-active">
                                <h3>Làm thế nào để đặt lịch hẹn khám bệnh tại phòng khám?</h3>
                                <div class="faq-content">
                                    <p>Bạn có thể đặt lịch hẹn trực tuyến qua website hoặc gọi điện trực tiếp tới phòng
                                        khám. Chúng tôi sẽ xác nhận thời gian và bác sĩ phù hợp với nhu cầu của bạn.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Chi phí khám và điều trị có được niêm yết rõ ràng không?</h3>
                                <div class="faq-content">
                                    <p>Tất cả các dịch vụ đều có bảng giá rõ ràng và minh bạch. Chúng tôi luôn thông báo
                                        trước chi phí để khách hàng yên tâm trước khi thực hiện dịch vụ.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Phòng khám có hỗ trợ khám cho trẻ em không?</h3>
                                <div class="faq-content">
                                    <p>Chúng tôi có khoa Nhi riêng, phục vụ khám và điều trị cho trẻ sơ sinh, trẻ em và
                                        thanh thiếu niên với đội ngũ bác sĩ chuyên môn cao và tận tâm.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Phòng khám có cung cấp dịch vụ xét nghiệm ngay tại cơ sở không?</h3>
                                <div class="faq-content">
                                    <p>Chúng tôi có phòng xét nghiệm nội bộ với trang thiết bị hiện đại, giúp kết quả nhanh
                                        chóng và chính xác, hỗ trợ bác sĩ chẩn đoán kịp thời.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Bác sĩ có thể tư vấn trực tuyến được không?</h3>
                                <div class="faq-content">
                                    <p>Chúng tôi cung cấp dịch vụ tư vấn trực tuyến qua video call cho những trường hợp
                                        không thể đến trực tiếp. Khách hàng có thể đặt lịch và nhận hướng dẫn qua website.
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Phòng khám có hỗ trợ bảo hiểm y tế không?</h3>
                                <div class="faq-content">
                                    <p>Chúng tôi liên kết với nhiều loại bảo hiểm y tế và cung cấp đầy đủ hóa đơn để khách
                                        hàng làm thủ tục thanh toán theo chính sách bảo hiểm.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                        </div>

                    </div><!-- End Faq Column-->

                </div>

            </div>

        </section><!-- /Faq Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section">

            <div class="container">

                <div class="row align-items-center">

                    <!-- Tiêu đề Section -->
                    <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
                        <h3>Phản Hồi Khách Hàng</h3>
                        <p>
                            Đây là những đánh giá từ khách hàng đã trải nghiệm dịch vụ của chúng tôi. Chúng tôi luôn nỗ lực
                            cung cấp dịch vụ tốt nhất và lắng nghe mọi ý kiến đóng góp để hoàn thiện.
                        </p>
                    </div>

                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">

                        <div class="swiper init-swiper">
                            <script type="application/json" class="swiper-config">
                                                                    {
                                                                      "loop": true,
                                                                      "speed": 600,
                                                                      "autoplay": {
                                                                        "delay": 5000
                                                                      },
                                                                      "slidesPerView": "auto",
                                                                      "pagination": {
                                                                        "el": ".swiper-pagination",
                                                                        "type": "bullets",
                                                                        "clickable": true
                                                                      }
                                                                    }
                                                                  </script>
                            <div class="swiper-wrapper">

                                <!-- Testimonial Item 1 -->
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="d-flex">
                                            <img src="{{ asset('client/assets/img/testimonials/testimonials-1.jpg') }}"
                                                class="testimonial-img shink-0" alt="Khách hàng 1">
                                            <div>
                                                <h3>Saul Goodman</h3>
                                                <h4>Giám đốc & Người sáng lập</h4>
                                                <div class="stars">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span>Dịch vụ rất chuyên nghiệp và tận tâm. Tôi hoàn toàn hài lòng với cách phục
                                                vụ và chất lượng chăm sóc khách hàng.</span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div>

                                <!-- Testimonial Item 2 -->
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="d-flex">
                                            <img src="{{ asset('client/assets/img/testimonials/testimonials-2.jpg') }}"
                                                class="testimonial-img shink-0" alt="Khách hàng 2">
                                            <div>
                                                <h3>Sara Wilsson</h3>
                                                <h4>Nhà thiết kế</h4>
                                                <div class="stars">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span>Rất hài lòng với chất lượng dịch vụ. Đội ngũ nhân viên nhiệt tình và chu
                                                đáo, mọi thắc mắc của tôi đều được giải đáp nhanh chóng.</span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div>

                                <!-- Testimonial Item 3 -->
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="d-flex">
                                            <img src="{{ asset('client/assets/img/testimonials/testimonials-3.jpg') }}"
                                                class="testimonial-img shink-0" alt="Khách hàng 3">
                                            <div>
                                                <h3>Jena Karlis</h3>
                                                <h4>Chủ cửa hàng</h4>
                                                <div class="stars">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span>Dịch vụ chất lượng cao, nhân viên thân thiện và chuyên nghiệp. Tôi cảm
                                                thấy rất hài lòng khi sử dụng dịch vụ.</span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div>

                                <!-- Testimonial Item 4 -->
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="d-flex">
                                            <img src="{{ asset('client/assets/img/testimonials/testimonials-4.jpg') }}"
                                                class="testimonial-img shink-0" alt="Khách hàng 4">
                                            <div>
                                                <h3>Matt Brandon</h3>
                                                <h4>Freelancer</h4>
                                                <div class="stars">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span>Rất chuyên nghiệp và tận tình. Tôi đánh giá cao sự hỗ trợ và chất lượng
                                                dịch vụ mà tôi nhận được.</span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div>

                                <!-- Testimonial Item 5 -->
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="d-flex">
                                            <img src="{{ asset('client/assets/img/testimonials/testimonials-5.jpg') }}"
                                                class="testimonial-img shink-0" alt="Khách hàng 5">
                                            <div>
                                                <h3>John Larson</h3>
                                                <h4>Doanh nhân</h4>
                                                <div class="stars">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span>Chất lượng dịch vụ tuyệt vời, đội ngũ nhân viên thân thiện và luôn sẵn
                                                sàng hỗ trợ khách hàng.</span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>

                    </div>

                </div>

            </div>

        </section><!-- /Testimonials Section -->

        <!-- Gallery Section -->
        <section id="gallery" class="gallery section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Ảnh Trưng Bày</h2>
                <p>Các hình ảnh minh họa về dịch vụ và cơ sở vật chất của chúng tôi</p>
            </div><!-- End Section Title -->

            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-0">

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('client/assets/img/gallery/gallery-1.jpg') }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('client/assets/img/gallery/gallery-1.jpg') }}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('client/assets/img/gallery/gallery-2.jpg') }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('client/assets/img/gallery/gallery-2.jpg') }}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('client/assets/img/gallery/gallery-3.jpg') }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('client/assets/img/gallery/gallery-3.jpg') }}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('client/assets/img/gallery/gallery-4.jpg') }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('client/assets/img/gallery/gallery-4.jpg') }}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="client/assets/img/gallery/gallery-5.jpg" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="client/assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="client/assets/img/gallery/gallery-6.jpg" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="client/assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="client/assets/img/gallery/gallery-7.jpg" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="client/assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="client/assets/img/gallery/gallery-8.jpg" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="client/assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                </div>

            </div>

        </section><!-- /Gallery Section -->
    </main>

@endsection