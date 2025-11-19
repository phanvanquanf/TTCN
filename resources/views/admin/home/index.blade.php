@extends('admin.layouts.app')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard Phòng Khám</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <!-- Lượt khám hôm nay -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Lọc</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Hôm nay</a></li>
                                        <li><a class="dropdown-item" href="#">Tháng này</a></li>
                                        <li><a class="dropdown-item" href="#">Năm nay</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Lượt khám <span>| Hôm nay</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-check"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>3000</h6>
                                            <span class="text-success small pt-1 fw-bold">15%</span> <span
                                                class="text-muted small pt-2 ps-1">tăng</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Lượt khám -->

                        <!-- Doanh thu -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Lọc</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Hôm nay</a></li>
                                        <li><a class="dropdown-item" href="#">Tháng này</a></li>
                                        <li><a class="dropdown-item" href="#">Năm nay</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Doanh thu <span>| Tháng này</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>₫48,520,000</h6>
                                            <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                class="text-muted small pt-2 ps-1">tăng</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Doanh thu -->

                        <!-- Bệnh nhân mới -->
                        <div class="col-xxl-4 col-xl-12">
                            <div class="card info-card customers-card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Lọc</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Hôm nay</a></li>
                                        <li><a class="dropdown-item" href="#">Tháng này</a></li>
                                        <li><a class="dropdown-item" href="#">Năm nay</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Bệnh nhân mới <span>| Năm nay</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-plus"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>342</h6>
                                            <span class="text-danger small pt-1 fw-bold">5%</span> <span
                                                class="text-muted small pt-2 ps-1">giảm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Bệnh nhân mới -->

                        <!-- Báo cáo lượt khám theo giờ -->
                        <div class="col-12">
                            <div class="card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Lọc</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Hôm nay</a></li>
                                        <li><a class="dropdown-item" href="#">Tháng này</a></li>
                                        <li><a class="dropdown-item" href="#">Năm nay</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Báo cáo lượt khám <span>/ Hôm nay</span></h5>

                                    <!-- Line Chart -->
                                    <div id="reportsChart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            new ApexCharts(document.querySelector("#reportsChart"), {
                                                series: [{
                                                    name: 'Lượt khám',
                                                    data: [12, 18, 15, 25, 22, 30, 20],
                                                }, {
                                                    name: 'Doanh thu (triệu ₫)',
                                                    data: [2.1, 3.2, 2.8, 4.5, 4.0, 5.8, 3.9]
                                                }, {
                                                    name: 'Bệnh nhân mới',
                                                    data: [3, 5, 2, 7, 4, 6, 3]
                                                }],
                                                chart: {
                                                    height: 350,
                                                    type: 'area',
                                                    toolbar: { show: false },
                                                },
                                                markers: { size: 4 },
                                                colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                                fill: {
                                                    type: "gradient",
                                                    gradient: {
                                                        shadeIntensity: 1,
                                                        opacityFrom: 0.3,
                                                        opacityTo: 0.4,
                                                        stops: [0, 90, 100]
                                                    }
                                                },
                                                dataLabels: { enabled: false },
                                                stroke: { curve: 'smooth', width: 2 },
                                                xaxis: {
                                                    type: 'datetime',
                                                    categories: ["2025-11-12T07:00:00.000Z", "2025-11-12T09:00:00.000Z", "2025-11-12T11:00:00.000Z", "2025-11-12T13:00:00.000Z", "2025-11-12T15:00:00.000Z", "2025-11-12T17:00:00.000Z", "2025-11-12T19:00:00.000Z"]
                                                },
                                                tooltip: { x: { format: 'dd/MM HH:mm' } },
                                            }).render();
                                        });
                                    </script>
                                    <!-- End Line Chart -->
                                </div>
                            </div>
                        </div><!-- End Báo cáo lượt khám -->

                        <!-- Lịch hẹn hôm nay -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Lọc</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Hôm nay</a></li>
                                        <li><a class="dropdown-item" href="#">Tuần này</a></li>
                                        <li><a class="dropdown-item" href="#">Tháng này</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Lịch hẹn hôm nay <span>| 12/11/2025</span></h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Mã BN</th>
                                                <th scope="col">Họ tên</th>
                                                <th scope="col">Dịch vụ</th>
                                                <th scope="col">Giờ hẹn</th>
                                                <th scope="col">Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><a href="#">#BN2457</a></th>
                                                <td>Nguyễn Văn An</td>
                                                <td><a href="#" class="text-primary">Khám nội tổng quát</a></td>
                                                <td>08:30</td>
                                                <td><span class="badge bg-success">Đã đến</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">#BN2147</a></th>
                                                <td>Trần Thị Bình</td>
                                                <td><a href="#" class="text-primary">Siêu âm thai</a></td>
                                                <td>09:15</td>
                                                <td><span class="badge bg-warning">Đang chờ</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">#BN2049</a></th>
                                                <td>Lê Hoàng Nam</td>
                                                <td><a href="#" class="text-primary">Khám nhi</a></td>
                                                <td>10:00</td>
                                                <td><span class="badge bg-success">Đã khám</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">#BN2644</a></th>
                                                <td>Phạm Minh Đức</td>
                                                <td><a href="#" class="text-primary">Xét nghiệm máu</a></td>
                                                <td>14:30</td>
                                                <td><span class="badge bg-danger">Hủy</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">#BN2981</a></th>
                                                <td>Vũ Thị Lan</td>
                                                <td><a href="#" class="text-primary">Khám răng</a></td>
                                                <td>16:00</td>
                                                <td><span class="badge bg-success">Đã khám</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End Lịch hẹn -->

                        <!-- Dịch vụ phổ biến -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Lọc</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Hôm nay</a></li>
                                        <li><a class="dropdown-item" href="#">Tháng này</a></li>
                                        <li><a class="dropdown-item" href="#">Năm nay</a></li>
                                    </ul>
                                </div>

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Dịch vụ phổ biến <span>| Hôm nay</span></h5>

                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">Hình ảnh</th>
                                                <th scope="col">Dịch vụ</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Số lượt</th>
                                                <th scope="col">Doanh thu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><a href="#"><img src="assets/img/service-general.jpg"
                                                            alt="Khám tổng quát"></a></th>
                                                <td><a href="#" class="text-primary fw-bold">Khám nội tổng quát</a></td>
                                                <td>₫250,000</td>
                                                <td class="fw-bold">28</td>
                                                <td>₫7,000,000</td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#"><img src="assets/img/service-ultrasound.jpg"
                                                            alt="Siêu âm"></a></th>
                                                <td><a href="#" class="text-primary fw-bold">Siêu âm thai</a></td>
                                                <td>₫450,000</td>
                                                <td class="fw-bold">18</td>
                                                <td>₫8,100,000</td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#"><img src="assets/img/service-bloodtest.jpg"
                                                            alt="Xét nghiệm"></a></th>
                                                <td><a href="#" class="text-primary fw-bold">Xét nghiệm máu</a></td>
                                                <td>₫380,000</td>
                                                <td class="fw-bold">15</td>
                                                <td>₫5,700,000</td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#"><img src="assets/img/service-dental.jpg"
                                                            alt="Nha khoa"></a></th>
                                                <td><a href="#" class="text-primary fw-bold">Khám & cạo vôi răng</a></td>
                                                <td>₫320,000</td>
                                                <td class="fw-bold">12</td>
                                                <td>₫3,840,000</td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#"><img src="assets/img/service-pediatric.jpg"
                                                            alt="Nhi khoa"></a></th>
                                                <td><a href="#" class="text-primary fw-bold">Khám nhi</a></td>
                                                <td>₫280,000</td>
                                                <td class="fw-bold">10</td>
                                                <td>₫2,800,000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End Dịch vụ phổ biến -->

                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">

                    <!-- Hoạt động gần đây -->
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Lọc</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Hôm nay</a></li>
                                <li><a class="dropdown-item" href="#">Tuần này</a></li>
                                <li><a class="dropdown-item" href="#">Tháng này</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Hoạt động gần đây <span>| Hôm nay</span></h5>

                            <div class="activity">
                                <div class="activity-item d-flex">
                                    <div class="activite-label">15 phút</div>
                                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                    <div class="activity-content">
                                        Bệnh nhân <a href="#" class="fw-bold text-dark">Nguyễn Văn An</a> đã đến khám
                                    </div>
                                </div>

                                <div class="activity-item d-flex">
                                    <div class="activite-label">42 phút</div>
                                    <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                                    <div class="activity-content">
                                        Lịch hẹn <a href="#" class="fw-bold text-dark">Trần Thị Bình</a> đang chờ
                                    </div>
                                </div>

                                <div class="activity-item d-flex">
                                    <div class="activite-label">1 giờ</div>
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        Bác sĩ <strong>Dr. Minh</strong> đã hoàn thành ca khám nhi
                                    </div>
                                </div>

                                <div class="activity-item d-flex">
                                    <div class="activite-label">2 giờ</div>
                                    <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                                    <div class="activity-content">
                                        Nhập kho <strong>500 hộp Paracetamol</strong>
                                    </div>
                                </div>

                                <div class="activity-item d-flex">
                                    <div class="activite-label">3 giờ</div>
                                    <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                    <div class="activity-content">
                                        Hủy lịch hẹn của bệnh nhân <strong>Phạm Minh Đức</strong>
                                    </div>
                                </div>

                                <div class="activity-item d-flex">
                                    <div class="activite-label">1 ngày</div>
                                    <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                                    <div class="activity-content">
                                        Cập nhật hồ sơ bệnh án cho <strong>12 bệnh nhân</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Hoạt động gần đây -->

                    <!-- Phân bổ ngân sách -->
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Lọc</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Tháng này</a></li>
                                <li><a class="dropdown-item" href="#">Quý này</a></li>
                                <li><a class="dropdown-item" href="#">Năm nay</a></li>
                            </ul>
                        </div>

                        <div class="card-body pb-0">
                            <h5 class="card-title">Phân bổ ngân sách <span>| Tháng 11/2025</span></h5>

                            <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                                        legend: { data: ['Ngân sách', 'Chi tiêu thực tế'] },
                                        radar: {
                                            indicator: [
                                                { name: 'Thuốc men', max: 30000000 },
                                                { name: 'Thiết bị y tế', max: 50000000 },
                                                { name: 'Nhân sự', max: 80000000 },
                                                { name: 'Vận hành', max: 40000000 },
                                                { name: 'Marketing', max: 20000000 },
                                                { name: 'Bảo trì', max: 15000000 }
                                            ]
                                        },
                                        series: [{
                                            name: 'Ngân sách vs Chi tiêu',
                                            type: 'radar',
                                            data: [
                                                { value: [25000000, 42000000, 70000000, 32000000, 15000000, 10000000], name: 'Ngân sách' },
                                                { value: [22000000, 38000000, 68000000, 30000000, 12000000, 11000000], name: 'Chi tiêu thực tế' }
                                            ]
                                        }]
                                    });
                                });
                            </script>
                        </div>
                    </div><!-- End Phân bổ ngân sách -->

                    <!-- Nguồn bệnh nhân -->
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Lọc</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Hôm nay</a></li>
                                <li><a class="dropdown-item" href="#">Tháng này</a></li>
                                <li><a class="dropdown-item" href="#">Năm nay</a></li>
                            </ul>
                        </div>

                        <div class="card-body pb-0">
                            <h5 class="card-title">Nguồn bệnh nhân <span>| Hôm nay</span></h5>

                            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    echarts.init(document.querySelector("#trafficChart")).setOption({
                                        tooltip: { trigger: 'item' },
                                        legend: { top: '5%', left: 'center' },
                                        series: [{
                                            name: 'Nguồn bệnh nhân',
                                            type: 'pie',
                                            radius: ['40%', '70%'],
                                            avoidLabelOverlap: false,
                                            label: { show: false, position: 'center' },
                                            emphasis: { label: { show: true, fontSize: '18', fontWeight: 'bold' } },
                                            labelLine: { show: false },
                                            data: [
                                                { value: 1000, name: 'Đặt lịch' },
                                                { value: 500, name: 'Giới thiệu' },
                                                { value: 400, name: 'Bệnh nhân' },
                                                { value: 900, name: 'Ghé thăm' },
                                                { value: 100, name: 'Truy cập' }
                                            ]
                                        }]
                                    });
                                });
                            </script>
                        </div>
                    </div><!-- End Nguồn bệnh nhân -->

                    <!-- Tin tức & Cập nhật -->
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Lọc</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Hôm nay</a></li>
                                <li><a class="dropdown-item" href="#">Tuần này</a></li>
                                <li><a class="dropdown-item" href="#">Tháng này</a></li>
                            </ul>
                        </div>

                        <div class="card-body pb-0">
                            <h5 class="card-title">Tin tức & Cập nhật <span>| Hôm nay</span></h5>

                            <div class="news">
                                <div class="post-item clearfix">
                                    <img src="assets/img/news-vaccine.jpg" alt="">
                                    <h4><a href="#">Chương trình tiêm chủng mở rộng tháng 12</a></h4>
                                    <p>Đăng ký tiêm vắc-xin cúm, sởi, HPV với giá ưu đãi...</p>
                                </div>

                                <div class="post-item clearfix">
                                    <img src="assets/img/news-doctor.jpg" alt="">
                                    <h4><a href="#">Bác sĩ CKI Nguyễn Minh Hùng về làm việc từ 15/11</a></h4>
                                    <p>Chuyên khoa Nội tiết - Tiểu đường, khám thứ 3, 5, 7...</p>
                                </div>

                                <div class="post-item clearfix">
                                    <img src="assets/img/news-equipment.jpg" alt="">
                                    <h4><a href="#">Trang bị máy siêu âm 5D mới nhất</a></h4>
                                    <p>Hình ảnh rõ nét, hỗ trợ chẩn đoán chính xác hơn...</p>
                                </div>

                                <div class="post-item clearfix">
                                    <img src="assets/img/news-holiday.jpg" alt="">
                                    <h4><a href="#">Lịch nghỉ lễ 30/4 - 1/5</a></h4>
                                    <p>Phòng khám nghỉ từ 29/4 đến 2/5, trực cấp cứu 24/7...</p>
                                </div>

                                <div class="post-item clearfix">
                                    <img src="assets/img/news-discount.jpg" alt="">
                                    <h4><a href="#">Ưu đãi 20% gói khám sức khỏe định kỳ</a></h4>
                                    <p>Áp dụng cho doanh nghiệp từ 10 người trở lên...</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Tin tức & Cập nhật -->

                </div><!-- End Right side columns -->

            </div>
        </section>

    </main><!-- End #main -->
@endsection