<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div id="kt_app_content" class="app-content  flex-column-fluid ">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-xxl ">
            <!--begin::Row-->
            <div class="row g-5 g-xl-10 mb-xl-10">
                <!--begin::Col-->
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">

                    <!--begin::Card widget 4-->
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Currency-->
                                    <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span>
                                    <!--end::Currency-->

                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">69,700</span>
                                    <!--end::Amount-->

                                    <!--begin::Badge-->
                                    <span class="badge badge-light-success fs-base">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                        <span class="svg-icon svg-icon-5 svg-icon-success ms-n1"><svg width="24"
                                                height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="13" y="6" width="13"
                                                    height="2" rx="1" transform="rotate(90 13 6)"
                                                    fill="currentColor"></rect>
                                                <path
                                                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        2.2%
                                    </span>
                                    <!--end::Badge-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-semibold fs-6">Expected Earnings</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-2 pb-4 d-flex align-items-center">
                            <!--begin::Chart-->
                            <div class="d-flex flex-center me-5 pt-2">
                                <div id="kt_card_widget_4_chart" style="min-width: 70px; min-height: 70px"
                                    data-kt-size="70" data-kt-line="11">
                                    <span></span><canvas height="70" width="70"></canvas>
                                </div>
                            </div>
                            <!--end::Chart-->

                            <!--begin::Labels-->
                            <div class="d-flex flex-column content-justify-center w-100">
                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-semibold align-items-center">
                                    <!--begin::Bullet-->
                                    <div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
                                    <!--end::Bullet-->

                                    <!--begin::Label-->
                                    <div class="text-gray-500 flex-grow-1 me-4">Shoes</div>
                                    <!--end::Label-->

                                    <!--begin::Stats-->
                                    <div class="fw-bolder text-gray-700 text-xxl-end">$7,660</div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Label-->

                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-semibold align-items-center my-3">
                                    <!--begin::Bullet-->
                                    <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                                    <!--end::Bullet-->

                                    <!--begin::Label-->
                                    <div class="text-gray-500 flex-grow-1 me-4">Gaming</div>
                                    <!--end::Label-->

                                    <!--begin::Stats-->
                                    <div class="fw-bolder text-gray-700 text-xxl-end">$2,820</div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Label-->

                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-semibold align-items-center">
                                    <!--begin::Bullet-->
                                    <div class="bullet w-8px h-6px rounded-2 me-3" style="background-color: #E4E6EF">
                                    </div>
                                    <!--end::Bullet-->

                                    <!--begin::Label-->
                                    <div class="text-gray-500 flex-grow-1 me-4">Others</div>
                                    <!--end::Label-->

                                    <!--begin::Stats-->
                                    <div class=" fw-bolder text-gray-700 text-xxl-end">$45,257</div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Labels-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 4-->

                    <!--begin::Card widget 5-->
                    <div class="card card-flush h-md-50 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">1,836</span>
                                    <!--end::Amount-->

                                    <!--begin::Badge-->
                                    <span class="badge badge-light-danger fs-base">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                        <span class="svg-icon svg-icon-5 svg-icon-danger ms-n1"><svg width="24"
                                                height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="11" y="18" width="13"
                                                    height="2" rx="1" transform="rotate(-90 11 18)"
                                                    fill="currentColor"></rect>
                                                <path
                                                    d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        2.2%
                                    </span>
                                    <!--end::Badge-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-semibold fs-6">Orders This Month</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                            <div class="d-flex align-items-center flex-column mt-3 w-100">
                                <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                    <span class="fw-bolder fs-6 text-dark">1,048 to Goal</span>
                                    <span class="fw-bold fs-6 text-gray-400">62%</span>
                                </div>

                                <div class="h-8px mx-3 w-100 bg-light-success rounded">
                                    <div class="bg-success rounded h-8px" role="progressbar" style="width: 62%;"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 5-->
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget 6-->
                    <div class="card card-flush  h-md-50 mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Currency-->
                                    <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span>
                                    <!--end::Currency-->

                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">2,420</span>
                                    <!--end::Amount-->

                                    <!--begin::Badge-->
                                    <span class="badge badge-light-success fs-base">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                        <span class="svg-icon svg-icon-5 svg-icon-success ms-n1"><svg width="24"
                                                height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="13" y="6" width="13"
                                                    height="2" rx="1" transform="rotate(90 13 6)"
                                                    fill="currentColor"></rect>
                                                <path
                                                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        2.6%
                                    </span>
                                    <!--end::Badge-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-semibold fs-6">Average Daily Sales</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end px-0 pb-0">
                            <!--begin::Chart-->
                            <div id="kt_card_widget_6_chart" class="w-100" style="height: 80px; min-height: 80px;">
                                <div id="apexchartslie4yw0v"
                                    class="apexcharts-canvas apexchartslie4yw0v apexcharts-theme-light"
                                    style="width: 291px; height: 80px;"><svg id="SvgjsSvg1533" width="291"
                                        height="80" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                        class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                        style="background: transparent;">
                                        <g id="SvgjsG1535" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(35.56111111111112, 0)">
                                            <defs id="SvgjsDefs1534">
                                                <clipPath id="gridRectMasklie4yw0v">
                                                    <rect id="SvgjsRect1538" width="284" height="89"
                                                        x="-28.061111111111114" y="-4.5" rx="0"
                                                        ry="0" opacity="1" stroke-width="0"
                                                        stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMasklie4yw0v"></clipPath>
                                                <clipPath id="nonForecastMasklie4yw0v"></clipPath>
                                                <clipPath id="gridRectMarkerMasklie4yw0v">
                                                    <rect id="SvgjsRect1539" width="231.87777777777777"
                                                        height="84" x="-2" y="-2" rx="0"
                                                        ry="0" opacity="1" stroke-width="0"
                                                        stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                            </defs>
                                            <g id="SvgjsG1558" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                <g id="SvgjsG1559" class="apexcharts-xaxis-texts-g"
                                                    transform="translate(0, -4)"></g>
                                            </g>
                                            <g id="SvgjsG1567" class="apexcharts-grid">
                                                <g id="SvgjsG1568" class="apexcharts-gridlines-horizontal"
                                                    style="display: none;">
                                                    <line id="SvgjsLine1570" x1="-21.561111111111114" y1="0"
                                                        x2="249.43888888888887" y2="0" stroke="#e1e3ea"
                                                        stroke-dasharray="4" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1571" x1="-21.561111111111114" y1="20"
                                                        x2="249.43888888888887" y2="20" stroke="#e1e3ea"
                                                        stroke-dasharray="4" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1572" x1="-21.561111111111114" y1="40"
                                                        x2="249.43888888888887" y2="40" stroke="#e1e3ea"
                                                        stroke-dasharray="4" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1573" x1="-21.561111111111114" y1="60"
                                                        x2="249.43888888888887" y2="60" stroke="#e1e3ea"
                                                        stroke-dasharray="4" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1574" x1="-21.561111111111114" y1="80"
                                                        x2="249.43888888888887" y2="80" stroke="#e1e3ea"
                                                        stroke-dasharray="4" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG1569" class="apexcharts-gridlines-vertical"
                                                    style="display: none;"></g>
                                                <line id="SvgjsLine1576" x1="0" y1="80"
                                                    x2="227.87777777777777" y2="80" stroke="transparent"
                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                <line id="SvgjsLine1575" x1="0" y1="1"
                                                    x2="0" y2="80" stroke="transparent"
                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                            </g>
                                            <g id="SvgjsG1540" class="apexcharts-bar-series apexcharts-plot-series">
                                                <g id="SvgjsG1541" class="apexcharts-series" rel="1"
                                                    seriesName="Sales" data:realIndex="0">
                                                    <path id="SvgjsPath1545"
                                                        d="M -10.444398148148148 80L -10.444398148148148 56Q -10.444398148148148 50 -4.444398148148148 50L -4.555601851851852 50Q 1.4443981481481476 50 1.4443981481481476 56L 1.4443981481481476 56L 1.4443981481481476 80L 1.4443981481481476 80z"
                                                        fill="rgba(0,158,247,0.85)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="9" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMasklie4yw0v)"
                                                        pathTo="M -10.444398148148148 80L -10.444398148148148 56Q -10.444398148148148 50 -4.444398148148148 50L -4.555601851851852 50Q 1.4443981481481476 50 1.4443981481481476 56L 1.4443981481481476 56L 1.4443981481481476 80L 1.4443981481481476 80z"
                                                        pathFrom="M -10.444398148148148 80L -10.444398148148148 80L 1.4443981481481476 80L 1.4443981481481476 80L 1.4443981481481476 80L 1.4443981481481476 80L 1.4443981481481476 80L -10.444398148148148 80"
                                                        cy="50" cx="5.944398148148148" j="0"
                                                        val="30" barHeight="30" barWidth="20.888796296296295">
                                                    </path>
                                                    <path id="SvgjsPath1547"
                                                        d="M 27.535231481481482 80L 27.535231481481482 26Q 27.535231481481482 20 33.53523148148148 20L 33.42402777777778 20Q 39.42402777777778 20 39.42402777777778 26L 39.42402777777778 26L 39.42402777777778 80L 39.42402777777778 80z"
                                                        fill="rgba(0,158,247,0.85)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="9" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMasklie4yw0v)"
                                                        pathTo="M 27.535231481481482 80L 27.535231481481482 26Q 27.535231481481482 20 33.53523148148148 20L 33.42402777777778 20Q 39.42402777777778 20 39.42402777777778 26L 39.42402777777778 26L 39.42402777777778 80L 39.42402777777778 80z"
                                                        pathFrom="M 27.535231481481482 80L 27.535231481481482 80L 39.42402777777778 80L 39.42402777777778 80L 39.42402777777778 80L 39.42402777777778 80L 39.42402777777778 80L 27.535231481481482 80"
                                                        cy="20" cx="43.92402777777778" j="1"
                                                        val="60" barHeight="60" barWidth="20.888796296296295">
                                                    </path>
                                                    <path id="SvgjsPath1549"
                                                        d="M 65.5148611111111 80L 65.5148611111111 33Q 65.5148611111111 27 71.5148611111111 27L 71.4036574074074 27Q 77.4036574074074 27 77.4036574074074 33L 77.4036574074074 33L 77.4036574074074 80L 77.4036574074074 80z"
                                                        fill="rgba(0,158,247,0.85)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="9" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMasklie4yw0v)"
                                                        pathTo="M 65.5148611111111 80L 65.5148611111111 33Q 65.5148611111111 27 71.5148611111111 27L 71.4036574074074 27Q 77.4036574074074 27 77.4036574074074 33L 77.4036574074074 33L 77.4036574074074 80L 77.4036574074074 80z"
                                                        pathFrom="M 65.5148611111111 80L 65.5148611111111 80L 77.4036574074074 80L 77.4036574074074 80L 77.4036574074074 80L 77.4036574074074 80L 77.4036574074074 80L 65.5148611111111 80"
                                                        cy="27" cx="81.9036574074074" j="2"
                                                        val="53" barHeight="53" barWidth="20.888796296296295">
                                                    </path>
                                                    <path id="SvgjsPath1551"
                                                        d="M 103.49449074074073 80L 103.49449074074073 41Q 103.49449074074073 35 109.49449074074073 35L 109.38328703703702 35Q 115.38328703703702 35 115.38328703703702 41L 115.38328703703702 41L 115.38328703703702 80L 115.38328703703702 80z"
                                                        fill="rgba(0,158,247,0.85)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="9" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMasklie4yw0v)"
                                                        pathTo="M 103.49449074074073 80L 103.49449074074073 41Q 103.49449074074073 35 109.49449074074073 35L 109.38328703703702 35Q 115.38328703703702 35 115.38328703703702 41L 115.38328703703702 41L 115.38328703703702 80L 115.38328703703702 80z"
                                                        pathFrom="M 103.49449074074073 80L 103.49449074074073 80L 115.38328703703702 80L 115.38328703703702 80L 115.38328703703702 80L 115.38328703703702 80L 115.38328703703702 80L 103.49449074074073 80"
                                                        cy="35" cx="119.88328703703702" j="3"
                                                        val="45" barHeight="45" barWidth="20.888796296296295">
                                                    </path>
                                                    <path id="SvgjsPath1553"
                                                        d="M 141.47412037037037 80L 141.47412037037037 26Q 141.47412037037037 20 147.47412037037037 20L 147.36291666666668 20Q 153.36291666666668 20 153.36291666666668 26L 153.36291666666668 26L 153.36291666666668 80L 153.36291666666668 80z"
                                                        fill="rgba(0,158,247,0.85)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="9" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMasklie4yw0v)"
                                                        pathTo="M 141.47412037037037 80L 141.47412037037037 26Q 141.47412037037037 20 147.47412037037037 20L 147.36291666666668 20Q 153.36291666666668 20 153.36291666666668 26L 153.36291666666668 26L 153.36291666666668 80L 153.36291666666668 80z"
                                                        pathFrom="M 141.47412037037037 80L 141.47412037037037 80L 153.36291666666668 80L 153.36291666666668 80L 153.36291666666668 80L 153.36291666666668 80L 153.36291666666668 80L 141.47412037037037 80"
                                                        cy="20" cx="157.86291666666668" j="4"
                                                        val="60" barHeight="60" barWidth="20.888796296296295">
                                                    </path>
                                                    <path id="SvgjsPath1555"
                                                        d="M 179.45375 80L 179.45375 11Q 179.45375 5 185.45375 5L 185.34254629629632 5Q 191.34254629629632 5 191.34254629629632 11L 191.34254629629632 11L 191.34254629629632 80L 191.34254629629632 80z"
                                                        fill="rgba(0,158,247,0.85)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="9" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMasklie4yw0v)"
                                                        pathTo="M 179.45375 80L 179.45375 11Q 179.45375 5 185.45375 5L 185.34254629629632 5Q 191.34254629629632 5 191.34254629629632 11L 191.34254629629632 11L 191.34254629629632 80L 191.34254629629632 80z"
                                                        pathFrom="M 179.45375 80L 179.45375 80L 191.34254629629632 80L 191.34254629629632 80L 191.34254629629632 80L 191.34254629629632 80L 191.34254629629632 80L 179.45375 80"
                                                        cy="5" cx="195.84254629629632" j="5"
                                                        val="75" barHeight="75" barWidth="20.888796296296295">
                                                    </path>
                                                    <path id="SvgjsPath1557"
                                                        d="M 217.43337962962963 80L 217.43337962962963 33Q 217.43337962962963 27 223.43337962962963 27L 223.32217592592593 27Q 229.32217592592593 27 229.32217592592593 33L 229.32217592592593 33L 229.32217592592593 80L 229.32217592592593 80z"
                                                        fill="rgba(0,158,247,0.85)" fill-opacity="1"
                                                        stroke="transparent" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="9" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMasklie4yw0v)"
                                                        pathTo="M 217.43337962962963 80L 217.43337962962963 33Q 217.43337962962963 27 223.43337962962963 27L 223.32217592592593 27Q 229.32217592592593 27 229.32217592592593 33L 229.32217592592593 33L 229.32217592592593 80L 229.32217592592593 80z"
                                                        pathFrom="M 217.43337962962963 80L 217.43337962962963 80L 229.32217592592593 80L 229.32217592592593 80L 229.32217592592593 80L 229.32217592592593 80L 229.32217592592593 80L 217.43337962962963 80"
                                                        cy="27" cx="233.82217592592593" j="6"
                                                        val="53" barHeight="53" barWidth="20.888796296296295">
                                                    </path>
                                                    <g id="SvgjsG1543" class="apexcharts-bar-goals-markers"
                                                        style="pointer-events: none">
                                                        <g id="SvgjsG1544" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1546" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1548" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1550" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1552" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1554" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                        <g id="SvgjsG1556" className="apexcharts-bar-goals-groups">
                                                        </g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1542" class="apexcharts-datalabels" data:realIndex="0">
                                                </g>
                                            </g>
                                            <line id="SvgjsLine1577" x1="-21.561111111111114" y1="0"
                                                x2="249.43888888888887" y2="0" stroke="#b6b6b6"
                                                stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine1578" x1="-21.561111111111114" y1="0"
                                                x2="249.43888888888887" y2="0" stroke-dasharray="0"
                                                stroke-width="0" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG1579" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG1580" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG1581" class="apexcharts-point-annotations"></g>
                                        </g>
                                        <g id="SvgjsG1566" class="apexcharts-yaxis" rel="0"
                                            transform="translate(-18, 0)"></g>
                                        <g id="SvgjsG1536" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-legend" style="max-height: 40px;"></div>
                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                        <div class="apexcharts-tooltip-title"
                                            style="font-family: inherit; font-size: 12px;"></div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(0, 158, 247);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: inherit; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 6-->


                    <!--begin::Card widget 7-->
                    <div class="card card-flush h-md-50 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">6.3k</span>
                                <!--end::Amount-->

                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-semibold fs-6">New Customers This Month</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Card body-->
                        <div class="card-body d-flex flex-column justify-content-end pe-0">
                            <!--begin::Title-->
                            <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Today’s Heroes</span>
                            <!--end::Title-->

                            <!--begin::Users group-->
                            <div class="symbol-group symbol-hover flex-nowrap">
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                    data-bs-original-title="Alan Warden" data-kt-initialized="1">
                                    <span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                    aria-label="Michael Eberon" data-bs-original-title="Michael Eberon"
                                    data-kt-initialized="1">
                                    <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-11.jpg">
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                    data-bs-original-title="Susan Redwood" data-kt-initialized="1">
                                    <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                    aria-label="Melody Macy" data-bs-original-title="Melody Macy"
                                    data-kt-initialized="1">
                                    <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-2.jpg">
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                    data-bs-original-title="Perry Matthew" data-kt-initialized="1">
                                    <span class="symbol-label bg-danger text-inverse-danger fw-bold">P</span>
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                    aria-label="Barry Walter" data-bs-original-title="Barry Walter"
                                    data-kt-initialized="1">
                                    <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-12.jpg">
                                </div>
                                <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_view_users">
                                    <span class="symbol-label bg-light text-gray-400 fs-8 fw-bold">+42</span>
                                </a>
                            </div>
                            <!--end::Users group-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 7-->
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
                    <!--begin::Chart widget 3-->
                    <div class="card card-flush overflow-hidden h-md-100">
                        <!--begin::Header-->
                        <div class="card-header py-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Sales This Months</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span>
                            </h3>
                            <!--end::Title-->

                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Menu-->
                                <button
                                    class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                    data-kt-menu-overflow="true">

                                    <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                    <span class="svg-icon svg-icon-1"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                height="20" rx="4" fill="currentColor"></rect>
                                            <rect x="11" y="11" width="2.6" height="2.6"
                                                rx="1.3" fill="currentColor"></rect>
                                            <rect x="15" y="11" width="2.6" height="2.6"
                                                rx="1.3" fill="currentColor"></rect>
                                            <rect x="7" y="11" width="2.6" height="2.6"
                                                rx="1.3" fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>


                                <!--begin::Menu 2-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator mb-3 opacity-75"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            New Ticket
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            New Customer
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                        data-kt-menu-placement="right-start">
                                        <!--begin::Menu item-->
                                        <a href="#" class="menu-link px-3">
                                            <span class="menu-title">New Group</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <!--end::Menu item-->

                                        <!--begin::Menu sub-->
                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">
                                                    Admin Group
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">
                                                    Staff Group
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">
                                                    Member Group
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu sub-->
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            New Contact
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator mt-3 opacity-75"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content px-3 py-3">
                                            <a class="btn btn-primary  btn-sm px-4" href="#">
                                                Generate Reports
                                            </a>
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu 2-->

                                <!--end::Menu-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Card body-->
                        <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                            <!--begin::Statistics-->
                            <div class="px-9 mb-5">
                                <!--begin::Statistics-->
                                <div class="d-flex mb-2">
                                    <span class="fs-4 fw-semibold text-gray-400 me-1">$</span>
                                    <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">14,094</span>
                                </div>
                                <!--end::Statistics-->

                                <!--begin::Description-->
                                <span class="fs-6 fw-semibold text-gray-400">Another $48,346 to Goal</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Statistics-->

                            <!--begin::Chart-->
                            <div id="kt_charts_widget_3" class="min-h-auto ps-4 pe-6"
                                style="height: 300px; min-height: 315px;">
                                <div id="apexchartsrgqktnti"
                                    class="apexcharts-canvas apexchartsrgqktnti apexcharts-theme-light"
                                    style="width: 581.5px; height: 300px;"><svg id="SvgjsSvg1294" width="581.5"
                                        height="300" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                        class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS"
                                        transform="translate(0, 0)" style="background: transparent;">
                                        <g id="SvgjsG1296" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(57.4312744140625, 30)">
                                            <defs id="SvgjsDefs1295">
                                                <clipPath id="gridRectMaskrgqktnti">
                                                    <rect id="SvgjsRect1301" width="521.0687255859375"
                                                        height="224.82" x="-3.5" y="-1.5" rx="0"
                                                        ry="0" opacity="1" stroke-width="0"
                                                        stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMaskrgqktnti"></clipPath>
                                                <clipPath id="nonForecastMaskrgqktnti"></clipPath>
                                                <clipPath id="gridRectMarkerMaskrgqktnti">
                                                    <rect id="SvgjsRect1302" width="518.0687255859375"
                                                        height="225.82" x="-2" y="-2" rx="0"
                                                        ry="0" opacity="1" stroke-width="0"
                                                        stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <linearGradient id="SvgjsLinearGradient1307" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop1308" stop-opacity="0.4"
                                                        stop-color="rgba(80,205,137,0.4)" offset="0"></stop>
                                                    <stop id="SvgjsStop1309" stop-opacity="0"
                                                        stop-color="rgba(255,255,255,0)" offset="0.8"></stop>
                                                    <stop id="SvgjsStop1310" stop-opacity="0"
                                                        stop-color="rgba(255,255,255,0)" offset="1"></stop>
                                                </linearGradient>
                                            </defs>
                                            <g id="SvgjsG1313" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                <g id="SvgjsG1314" class="apexcharts-xaxis-texts-g"
                                                    transform="translate(0, -10)"><text id="SvgjsText1316"
                                                        font-family="inherit" x="0" y="244.82"
                                                        text-anchor="end" dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1317"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1319" font-family="inherit"
                                                        x="28.559373643663193" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1320"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1322" font-family="inherit"
                                                        x="57.11874728732639" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1323"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1325" font-family="inherit"
                                                        x="85.67812093098959" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;"
                                                        transform="rotate(0 86.6781234741211 239.32000732421875)">
                                                        <tspan id="SvgjsTspan1326">Apr 04</tspan>
                                                        <title>Apr 04</title>
                                                    </text><text id="SvgjsText1328" font-family="inherit"
                                                        x="114.23749457465277" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1329"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1331" font-family="inherit"
                                                        x="142.79686821831598" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1332"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1334" font-family="inherit"
                                                        x="171.35624186197919" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;"
                                                        transform="rotate(0 172.42475128173828 239.32000732421875)">
                                                        <tspan id="SvgjsTspan1335">Apr 07</tspan>
                                                        <title>Apr 07</title>
                                                    </text><text id="SvgjsText1337" font-family="inherit"
                                                        x="199.9156155056424" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1338"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1340" font-family="inherit"
                                                        x="228.4749891493056" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1341"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1343" font-family="inherit"
                                                        x="257.0343627929688" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;"
                                                        transform="rotate(0 258.03436279296875 239.32000732421875)">
                                                        <tspan id="SvgjsTspan1344">Apr 10</tspan>
                                                        <title>Apr 10</title>
                                                    </text><text id="SvgjsText1346" font-family="inherit"
                                                        x="285.593736436632" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1347"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1349" font-family="inherit"
                                                        x="314.1531100802952" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1350"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1352" font-family="inherit"
                                                        x="342.7124837239584" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;"
                                                        transform="rotate(0 343.7124938964844 239.32000732421875)">
                                                        <tspan id="SvgjsTspan1353">Apr 13</tspan>
                                                        <title>Apr 13</title>
                                                    </text><text id="SvgjsText1355" font-family="inherit"
                                                        x="371.27185736762164" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1356"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1358" font-family="inherit"
                                                        x="399.83123101128484" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1359"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1361" font-family="inherit"
                                                        x="428.39060465494805" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;"
                                                        transform="rotate(0 429.3905944824219 239.32000732421875)">
                                                        <tspan id="SvgjsTspan1362">Apr 16</tspan>
                                                        <title>Apr 16</title>
                                                    </text><text id="SvgjsText1364" font-family="inherit"
                                                        x="456.94997829861126" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1365"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1367" font-family="inherit"
                                                        x="485.50935194227446" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1368"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1370" font-family="inherit"
                                                        x="514.0687255859377" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1371"></tspan>
                                                        <title></title>
                                                    </text></g>
                                            </g>
                                            <g id="SvgjsG1389" class="apexcharts-grid">
                                                <g id="SvgjsG1390" class="apexcharts-gridlines-horizontal">
                                                    <line id="SvgjsLine1392" x1="0" y1="0"
                                                        x2="514.0687255859375" y2="0" stroke="#e1e3ea"
                                                        stroke-dasharray="4" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1393" x1="0" y1="55.455"
                                                        x2="514.0687255859375" y2="55.455" stroke="#e1e3ea"
                                                        stroke-dasharray="4" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1394" x1="0" y1="110.91"
                                                        x2="514.0687255859375" y2="110.91" stroke="#e1e3ea"
                                                        stroke-dasharray="4" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1395" x1="0" y1="166.365"
                                                        x2="514.0687255859375" y2="166.365" stroke="#e1e3ea"
                                                        stroke-dasharray="4" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1396" x1="0" y1="221.82"
                                                        x2="514.0687255859375" y2="221.82" stroke="#e1e3ea"
                                                        stroke-dasharray="4" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG1391" class="apexcharts-gridlines-vertical"></g>
                                                <line id="SvgjsLine1398" x1="0" y1="221.82"
                                                    x2="514.0687255859375" y2="221.82" stroke="transparent"
                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                <line id="SvgjsLine1397" x1="0" y1="1"
                                                    x2="0" y2="221.82" stroke="transparent"
                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                            </g>
                                            <g id="SvgjsG1303" class="apexcharts-area-series apexcharts-plot-series">
                                                <g id="SvgjsG1304" class="apexcharts-series" seriesName="Sales"
                                                    data:longestSeries="true" rel="1" data:realIndex="0">
                                                    <path id="SvgjsPath1311"
                                                        d="M 0 221.82L 0 95.06571428571425C 9.995780775282118 95.06571428571425 18.563592868381075 95.06571428571425 28.559373643663193 95.06571428571425C 38.55515441894531 95.06571428571425 47.12296651204427 63.377142857142815 57.118747287326386 63.377142857142815C 67.1145280626085 63.377142857142815 75.68234015570746 63.377142857142815 85.67812093098958 63.377142857142815C 95.67390170627169 63.377142857142815 104.24171379937066 95.06571428571425 114.23749457465277 95.06571428571425C 124.2332753499349 95.06571428571425 132.80108744303385 95.06571428571425 142.79686821831598 95.06571428571425C 152.79264899359808 95.06571428571425 161.36046108669706 31.68857142857138 171.35624186197916 31.68857142857138C 181.35202263726129 31.68857142857138 189.91983473036024 31.68857142857138 199.91561550564236 31.68857142857138C 209.91139628092446 31.68857142857138 218.47920837402344 63.377142857142815 228.47498914930554 63.377142857142815C 238.47076992458767 63.377142857142815 247.03858201768662 63.377142857142815 257.03436279296875 63.377142857142815C 267.0301435682509 63.377142857142815 275.59795566134983 95.06571428571425 285.59373643663196 95.06571428571425C 295.5895172119141 95.06571428571425 304.157329305013 95.06571428571425 314.1531100802951 95.06571428571425C 324.14889085557724 95.06571428571425 332.7167029486762 63.377142857142815 342.7124837239583 63.377142857142815C 352.70826449924044 63.377142857142815 361.2760765923394 63.377142857142815 371.2718573676215 63.377142857142815C 381.26763814290365 63.377142857142815 389.8354502360026 95.06571428571425 399.83123101128473 95.06571428571425C 409.82701178656686 95.06571428571425 418.39482387966575 95.06571428571425 428.3906046549479 95.06571428571425C 438.38638543023 95.06571428571425 446.95419752332896 63.377142857142815 456.9499782986111 63.377142857142815C 466.9457590738932 63.377142857142815 475.51357116699216 63.377142857142815 485.5093519422743 63.377142857142815C 495.5051327175564 63.377142857142815 504.0729448106554 31.68857142857138 514.0687255859375 31.68857142857138C 514.0687255859375 31.68857142857138 514.0687255859375 31.68857142857138 514.0687255859375 221.82M 514.0687255859375 31.68857142857138z"
                                                        fill="url(#SvgjsLinearGradient1307)" fill-opacity="1"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0" class="apexcharts-area" index="0"
                                                        clip-path="url(#gridRectMaskrgqktnti)"
                                                        pathTo="M 0 221.82L 0 95.06571428571425C 9.995780775282118 95.06571428571425 18.563592868381075 95.06571428571425 28.559373643663193 95.06571428571425C 38.55515441894531 95.06571428571425 47.12296651204427 63.377142857142815 57.118747287326386 63.377142857142815C 67.1145280626085 63.377142857142815 75.68234015570746 63.377142857142815 85.67812093098958 63.377142857142815C 95.67390170627169 63.377142857142815 104.24171379937066 95.06571428571425 114.23749457465277 95.06571428571425C 124.2332753499349 95.06571428571425 132.80108744303385 95.06571428571425 142.79686821831598 95.06571428571425C 152.79264899359808 95.06571428571425 161.36046108669706 31.68857142857138 171.35624186197916 31.68857142857138C 181.35202263726129 31.68857142857138 189.91983473036024 31.68857142857138 199.91561550564236 31.68857142857138C 209.91139628092446 31.68857142857138 218.47920837402344 63.377142857142815 228.47498914930554 63.377142857142815C 238.47076992458767 63.377142857142815 247.03858201768662 63.377142857142815 257.03436279296875 63.377142857142815C 267.0301435682509 63.377142857142815 275.59795566134983 95.06571428571425 285.59373643663196 95.06571428571425C 295.5895172119141 95.06571428571425 304.157329305013 95.06571428571425 314.1531100802951 95.06571428571425C 324.14889085557724 95.06571428571425 332.7167029486762 63.377142857142815 342.7124837239583 63.377142857142815C 352.70826449924044 63.377142857142815 361.2760765923394 63.377142857142815 371.2718573676215 63.377142857142815C 381.26763814290365 63.377142857142815 389.8354502360026 95.06571428571425 399.83123101128473 95.06571428571425C 409.82701178656686 95.06571428571425 418.39482387966575 95.06571428571425 428.3906046549479 95.06571428571425C 438.38638543023 95.06571428571425 446.95419752332896 63.377142857142815 456.9499782986111 63.377142857142815C 466.9457590738932 63.377142857142815 475.51357116699216 63.377142857142815 485.5093519422743 63.377142857142815C 495.5051327175564 63.377142857142815 504.0729448106554 31.68857142857138 514.0687255859375 31.68857142857138C 514.0687255859375 31.68857142857138 514.0687255859375 31.68857142857138 514.0687255859375 221.82M 514.0687255859375 31.68857142857138z"
                                                        pathFrom="M -1 380.2628571428571L -1 380.2628571428571L 28.559373643663193 380.2628571428571L 57.118747287326386 380.2628571428571L 85.67812093098958 380.2628571428571L 114.23749457465277 380.2628571428571L 142.79686821831598 380.2628571428571L 171.35624186197916 380.2628571428571L 199.91561550564236 380.2628571428571L 228.47498914930554 380.2628571428571L 257.03436279296875 380.2628571428571L 285.59373643663196 380.2628571428571L 314.1531100802951 380.2628571428571L 342.7124837239583 380.2628571428571L 371.2718573676215 380.2628571428571L 399.83123101128473 380.2628571428571L 428.3906046549479 380.2628571428571L 456.9499782986111 380.2628571428571L 485.5093519422743 380.2628571428571L 514.0687255859375 380.2628571428571">
                                                    </path>
                                                    <path id="SvgjsPath1312"
                                                        d="M 0 95.06571428571425C 9.995780775282118 95.06571428571425 18.563592868381075 95.06571428571425 28.559373643663193 95.06571428571425C 38.55515441894531 95.06571428571425 47.12296651204427 63.377142857142815 57.118747287326386 63.377142857142815C 67.1145280626085 63.377142857142815 75.68234015570746 63.377142857142815 85.67812093098958 63.377142857142815C 95.67390170627169 63.377142857142815 104.24171379937066 95.06571428571425 114.23749457465277 95.06571428571425C 124.2332753499349 95.06571428571425 132.80108744303385 95.06571428571425 142.79686821831598 95.06571428571425C 152.79264899359808 95.06571428571425 161.36046108669706 31.68857142857138 171.35624186197916 31.68857142857138C 181.35202263726129 31.68857142857138 189.91983473036024 31.68857142857138 199.91561550564236 31.68857142857138C 209.91139628092446 31.68857142857138 218.47920837402344 63.377142857142815 228.47498914930554 63.377142857142815C 238.47076992458767 63.377142857142815 247.03858201768662 63.377142857142815 257.03436279296875 63.377142857142815C 267.0301435682509 63.377142857142815 275.59795566134983 95.06571428571425 285.59373643663196 95.06571428571425C 295.5895172119141 95.06571428571425 304.157329305013 95.06571428571425 314.1531100802951 95.06571428571425C 324.14889085557724 95.06571428571425 332.7167029486762 63.377142857142815 342.7124837239583 63.377142857142815C 352.70826449924044 63.377142857142815 361.2760765923394 63.377142857142815 371.2718573676215 63.377142857142815C 381.26763814290365 63.377142857142815 389.8354502360026 95.06571428571425 399.83123101128473 95.06571428571425C 409.82701178656686 95.06571428571425 418.39482387966575 95.06571428571425 428.3906046549479 95.06571428571425C 438.38638543023 95.06571428571425 446.95419752332896 63.377142857142815 456.9499782986111 63.377142857142815C 466.9457590738932 63.377142857142815 475.51357116699216 63.377142857142815 485.5093519422743 63.377142857142815C 495.5051327175564 63.377142857142815 504.0729448106554 31.68857142857138 514.0687255859375 31.68857142857138"
                                                        fill="none" fill-opacity="1" stroke="#50cd89"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                        stroke-dasharray="0" class="apexcharts-area"
                                                        index="0" clip-path="url(#gridRectMaskrgqktnti)"
                                                        pathTo="M 0 95.06571428571425C 9.995780775282118 95.06571428571425 18.563592868381075 95.06571428571425 28.559373643663193 95.06571428571425C 38.55515441894531 95.06571428571425 47.12296651204427 63.377142857142815 57.118747287326386 63.377142857142815C 67.1145280626085 63.377142857142815 75.68234015570746 63.377142857142815 85.67812093098958 63.377142857142815C 95.67390170627169 63.377142857142815 104.24171379937066 95.06571428571425 114.23749457465277 95.06571428571425C 124.2332753499349 95.06571428571425 132.80108744303385 95.06571428571425 142.79686821831598 95.06571428571425C 152.79264899359808 95.06571428571425 161.36046108669706 31.68857142857138 171.35624186197916 31.68857142857138C 181.35202263726129 31.68857142857138 189.91983473036024 31.68857142857138 199.91561550564236 31.68857142857138C 209.91139628092446 31.68857142857138 218.47920837402344 63.377142857142815 228.47498914930554 63.377142857142815C 238.47076992458767 63.377142857142815 247.03858201768662 63.377142857142815 257.03436279296875 63.377142857142815C 267.0301435682509 63.377142857142815 275.59795566134983 95.06571428571425 285.59373643663196 95.06571428571425C 295.5895172119141 95.06571428571425 304.157329305013 95.06571428571425 314.1531100802951 95.06571428571425C 324.14889085557724 95.06571428571425 332.7167029486762 63.377142857142815 342.7124837239583 63.377142857142815C 352.70826449924044 63.377142857142815 361.2760765923394 63.377142857142815 371.2718573676215 63.377142857142815C 381.26763814290365 63.377142857142815 389.8354502360026 95.06571428571425 399.83123101128473 95.06571428571425C 409.82701178656686 95.06571428571425 418.39482387966575 95.06571428571425 428.3906046549479 95.06571428571425C 438.38638543023 95.06571428571425 446.95419752332896 63.377142857142815 456.9499782986111 63.377142857142815C 466.9457590738932 63.377142857142815 475.51357116699216 63.377142857142815 485.5093519422743 63.377142857142815C 495.5051327175564 63.377142857142815 504.0729448106554 31.68857142857138 514.0687255859375 31.68857142857138"
                                                        pathFrom="M -1 380.2628571428571L -1 380.2628571428571L 28.559373643663193 380.2628571428571L 57.118747287326386 380.2628571428571L 85.67812093098958 380.2628571428571L 114.23749457465277 380.2628571428571L 142.79686821831598 380.2628571428571L 171.35624186197916 380.2628571428571L 199.91561550564236 380.2628571428571L 228.47498914930554 380.2628571428571L 257.03436279296875 380.2628571428571L 285.59373643663196 380.2628571428571L 314.1531100802951 380.2628571428571L 342.7124837239583 380.2628571428571L 371.2718573676215 380.2628571428571L 399.83123101128473 380.2628571428571L 428.3906046549479 380.2628571428571L 456.9499782986111 380.2628571428571L 485.5093519422743 380.2628571428571L 514.0687255859375 380.2628571428571"
                                                        fill-rule="evenodd"></path>
                                                    <g id="SvgjsG1305" class="apexcharts-series-markers-wrap"
                                                        data:realIndex="0">
                                                        <g class="apexcharts-series-markers">
                                                            <circle id="SvgjsCircle1406" r="0"
                                                                cx="0" cy="0"
                                                                class="apexcharts-marker w929eqvjxi no-pointer-events"
                                                                stroke="#50cd89" fill="#50cd89" fill-opacity="1"
                                                                stroke-width="3" stroke-opacity="0.9"
                                                                default-marker-size="0"></circle>
                                                        </g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1306" class="apexcharts-datalabels"
                                                    data:realIndex="0"></g>
                                            </g>
                                            <line id="SvgjsLine1400" x1="0" y1="0"
                                                x2="0" y2="221.82" stroke="#50cd89"
                                                stroke-dasharray="3" stroke-linecap="butt"
                                                class="apexcharts-xcrosshairs" x="0" y="0"
                                                width="1" height="221.82" fill="#b1b9c4" filter="none"
                                                fill-opacity="0.9" stroke-width="1"></line>
                                            <line id="SvgjsLine1401" x1="0" y1="0"
                                                x2="514.0687255859375" y2="0" stroke="#b6b6b6"
                                                stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine1402" x1="0" y1="0"
                                                x2="514.0687255859375" y2="0" stroke-dasharray="0"
                                                stroke-width="0" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG1403" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG1404" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG1405" class="apexcharts-point-annotations"></g>
                                            <rect id="SvgjsRect1407" width="0" height="0"
                                                x="0" y="0" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none"
                                                stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect">
                                            </rect>
                                            <rect id="SvgjsRect1408" width="0" height="0"
                                                x="0" y="0" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none"
                                                stroke-dasharray="0" fill="#fefefe"
                                                class="apexcharts-selection-rect"></rect>
                                        </g>
                                        <g id="SvgjsG1372" class="apexcharts-yaxis" rel="0"
                                            transform="translate(27.4312744140625, 0)">
                                            <g id="SvgjsG1373" class="apexcharts-yaxis-texts-g"><text
                                                    id="SvgjsText1375" font-family="inherit" x="20"
                                                    y="31.4" text-anchor="end" dominant-baseline="auto"
                                                    font-size="12px" font-weight="400" fill="#a1a5b7"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: inherit;">
                                                    <tspan id="SvgjsTspan1376">$24K</tspan>
                                                    <title>$24K</title>
                                                </text><text id="SvgjsText1378" font-family="inherit"
                                                    x="20" y="86.855" text-anchor="end"
                                                    dominant-baseline="auto" font-size="12px" font-weight="400"
                                                    fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: inherit;">
                                                    <tspan id="SvgjsTspan1379">$20.5K</tspan>
                                                    <title>$20.5K</title>
                                                </text><text id="SvgjsText1381" font-family="inherit"
                                                    x="20" y="142.31" text-anchor="end"
                                                    dominant-baseline="auto" font-size="12px" font-weight="400"
                                                    fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: inherit;">
                                                    <tspan id="SvgjsTspan1382">$17K</tspan>
                                                    <title>$17K</title>
                                                </text><text id="SvgjsText1384" font-family="inherit"
                                                    x="20" y="197.76500000000001" text-anchor="end"
                                                    dominant-baseline="auto" font-size="12px" font-weight="400"
                                                    fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: inherit;">
                                                    <tspan id="SvgjsTspan1385">$13.5K</tspan>
                                                    <title>$13.5K</title>
                                                </text><text id="SvgjsText1387" font-family="inherit"
                                                    x="20" y="253.22" text-anchor="end"
                                                    dominant-baseline="auto" font-size="12px" font-weight="400"
                                                    fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: inherit;">
                                                    <tspan id="SvgjsTspan1388">$10K</tspan>
                                                    <title>$10K</title>
                                                </text></g>
                                        </g>
                                        <rect id="SvgjsRect1399" width="0" height="0" x="0"
                                            y="0" rx="0" ry="0" opacity="1"
                                            stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe">
                                        </rect>
                                        <g id="SvgjsG1297" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-legend" style="max-height: 150px;"></div>
                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                        <div class="apexcharts-tooltip-title"
                                            style="font-family: inherit; font-size: 12px;"></div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(80, 205, 137);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: inherit; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                        <div class="apexcharts-xaxistooltip-text"
                                            style="font-family: inherit; font-size: 12px;"></div>
                                    </div>
                                    <div
                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Chart widget 3-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xl-6 mb-xl-10">

                    <!--begin::Table widget 2-->
                    <div class="card h-md-100">
                        <!--begin::Header-->
                        <div class="card-header align-items-center border-0">
                            <!--begin::Title-->
                            <h3 class="fw-bold text-gray-900 m-0">Recent Orders</h3>
                            <!--end::Title-->

                            <!--begin::Menu-->
                            <button
                                class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                data-kt-menu-overflow="true">

                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                <span class="svg-icon svg-icon-1"><svg width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20"
                                            height="20" rx="4" fill="currentColor"></rect>
                                        <rect x="11" y="11" width="2.6" height="2.6"
                                            rx="1.3" fill="currentColor"></rect>
                                        <rect x="15" y="11" width="2.6" height="2.6"
                                            rx="1.3" fill="currentColor"></rect>
                                        <rect x="7" y="11" width="2.6" height="2.6"
                                            rx="1.3" fill="currentColor"></rect>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>

                            <!--begin::Menu 2-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu separator-->
                                <div class="separator mb-3 opacity-75"></div>
                                <!--end::Menu separator-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">
                                        New Ticket
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">
                                        New Customer
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                    data-kt-menu-placement="right-start">
                                    <!--begin::Menu item-->
                                    <a href="#" class="menu-link px-3">
                                        <span class="menu-title">New Group</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <!--end::Menu item-->

                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Admin Group
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Staff Group
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Member Group
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">
                                        New Contact
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu separator-->
                                <div class="separator mt-3 opacity-75"></div>
                                <!--end::Menu separator-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content px-3 py-3">
                                        <a class="btn btn-primary  btn-sm px-4" href="#">
                                            Generate Reports
                                        </a>
                                    </div>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 2-->

                            <!--end::Menu-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body pt-2">
                            <!--begin::Nav-->
                            <ul class="nav nav-pills nav-pills-custom mb-3" role="tablist">
                                <!--begin::Item-->
                                <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                                    <!--begin::Link-->
                                    <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden active w-80px h-85px py-4"
                                        data-bs-toggle="pill" href="#kt_stats_widget_2_tab_1" aria-selected="true"
                                        role="tab">
                                        <!--begin::Icon-->
                                        <div class="nav-icon">
                                            <img alt=""
                                                src="/metronic8/demo1/assets/media/svg/products-categories/t-shirt.svg"
                                                class="">
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Subtitle-->
                                        <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">
                                            T-shirt
                                        </span>
                                        <!--end::Subtitle-->

                                        <!--begin::Bullet-->
                                        <span
                                            class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                        <!--end::Bullet-->
                                    </a>
                                    <!--end::Link-->
                                </li>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                                    <!--begin::Link-->
                                    <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4"
                                        data-bs-toggle="pill" href="#kt_stats_widget_2_tab_2"
                                        aria-selected="false" tabindex="-1" role="tab">
                                        <!--begin::Icon-->
                                        <div class="nav-icon">
                                            <img alt=""
                                                src="/metronic8/demo1/assets/media/svg/products-categories/gaming.svg"
                                                class="">
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Subtitle-->
                                        <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">
                                            Gaming
                                        </span>
                                        <!--end::Subtitle-->

                                        <!--begin::Bullet-->
                                        <span
                                            class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                        <!--end::Bullet-->
                                    </a>
                                    <!--end::Link-->
                                </li>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                                    <!--begin::Link-->
                                    <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4"
                                        data-bs-toggle="pill" href="#kt_stats_widget_2_tab_3"
                                        aria-selected="false" tabindex="-1" role="tab">
                                        <!--begin::Icon-->
                                        <div class="nav-icon">
                                            <img alt=""
                                                src="/metronic8/demo1/assets/media/svg/products-categories/watch.svg"
                                                class="">
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Subtitle-->
                                        <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">
                                            Watch
                                        </span>
                                        <!--end::Subtitle-->

                                        <!--begin::Bullet-->
                                        <span
                                            class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                        <!--end::Bullet-->
                                    </a>
                                    <!--end::Link-->
                                </li>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                                    <!--begin::Link-->
                                    <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4"
                                        data-bs-toggle="pill" href="#kt_stats_widget_2_tab_4"
                                        aria-selected="false" tabindex="-1" role="tab">
                                        <!--begin::Icon-->
                                        <div class="nav-icon">
                                            <img alt=""
                                                src="/metronic8/demo1/assets/media/svg/products-categories/gloves.svg"
                                                class="nav-icon">
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Subtitle-->
                                        <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">
                                            Gloves
                                        </span>
                                        <!--end::Subtitle-->

                                        <!--begin::Bullet-->
                                        <span
                                            class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                        <!--end::Bullet-->
                                    </a>
                                    <!--end::Link-->
                                </li>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <li class="nav-item mb-3" role="presentation">
                                    <!--begin::Link-->
                                    <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4"
                                        data-bs-toggle="pill" href="#kt_stats_widget_2_tab_5"
                                        aria-selected="false" tabindex="-1" role="tab">
                                        <!--begin::Icon-->
                                        <div class="nav-icon">
                                            <img alt=""
                                                src="/metronic8/demo1/assets/media/svg/products-categories/shoes.svg"
                                                class="nav-icon">
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Subtitle-->
                                        <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">
                                            Shoes
                                        </span>
                                        <!--end::Subtitle-->

                                        <!--begin::Bullet-->
                                        <span
                                            class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                        <!--end::Bullet-->
                                    </a>
                                    <!--end::Link-->
                                </li>
                                <!--end::Item-->
                            </ul>
                            <!--end::Nav-->

                            <!--begin::Tab Content-->
                            <div class="tab-content">

                                <!--begin::Tap pane-->
                                <div class="tab-pane fade show active" id="kt_stats_widget_2_tab_1"
                                    role="tabpanel">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="ps-0 w-50px">ITEM</th>
                                                    <th class="min-w-125px"></th>
                                                    <th class="text-end min-w-100px">QTY</th>
                                                    <th class="pe-0 text-end min-w-100px">PRICE</th>
                                                    <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/210.gif"
                                                            class="w-50px ms-n1" alt="">
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant
                                                            1802</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-2347</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$72.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$126.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/215.gif"
                                                            class="w-50px ms-n1" alt="">
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red
                                                            Laga</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-1321</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$45.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$76.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/209.gif"
                                                            class="w-50px ms-n1" alt="">
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-4312</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$84.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$168.00</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--end::Tap pane-->

                                <!--begin::Tap pane-->
                                <div class="tab-pane fade " id="kt_stats_widget_2_tab_2" role="tabpanel">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="ps-0 w-50px">ITEM</th>
                                                    <th class="min-w-125px"></th>
                                                    <th class="text-end min-w-100px">QTY</th>
                                                    <th class="pe-0 text-end min-w-100px">PRICE</th>
                                                    <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/197.gif"
                                                            class="w-50px ms-n1" alt="">
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant
                                                            1802</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-4312</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$32.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$312.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/178.gif"
                                                            class="w-50px ms-n1" alt="">
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red
                                                            Laga</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-3122</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$53.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$62.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/22.gif"
                                                            class="w-50px ms-n1" alt="">
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-1142</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$74.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$139.00</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--end::Tap pane-->

                                <!--begin::Tap pane-->
                                <div class="tab-pane fade " id="kt_stats_widget_2_tab_3" role="tabpanel">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="ps-0 w-50px">ITEM</th>
                                                    <th class="min-w-125px"></th>
                                                    <th class="text-end min-w-100px">QTY</th>
                                                    <th class="pe-0 text-end min-w-100px">PRICE</th>
                                                    <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/1.gif"
                                                            class="w-50px ms-n1" alt="">
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant
                                                            1324</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-1523</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$43.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$231.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/24.gif"
                                                            class="w-50px ms-n1" alt="">
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red
                                                            Laga</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-5314</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$71.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$53.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/71.gif"
                                                            class="w-50px ms-n1" alt="">
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-4222</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$23.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$213.00</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--end::Tap pane-->

                                <!--begin::Tap pane-->
                                <div class="tab-pane fade " id="kt_stats_widget_2_tab_4" role="tabpanel">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="ps-0 w-50px">ITEM</th>
                                                    <th class="min-w-125px"></th>
                                                    <th class="text-end min-w-100px">QTY</th>
                                                    <th class="pe-0 text-end min-w-100px">PRICE</th>
                                                    <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/41.gif"
                                                            class="w-50px ms-n1" alt="">
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant
                                                            2635</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-1523</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$65.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$163.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/63.gif"
                                                            class="w-50px ms-n1" alt="">
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red
                                                            Laga</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-2745</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$64.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$73.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/59.gif"
                                                            class="w-50px ms-n1" alt="">
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-5173</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$54.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$173.00</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--end::Tap pane-->

                                <!--begin::Tap pane-->
                                <div class="tab-pane fade " id="kt_stats_widget_2_tab_5" role="tabpanel">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="ps-0 w-50px">ITEM</th>
                                                    <th class="min-w-125px"></th>
                                                    <th class="text-end min-w-100px">QTY</th>
                                                    <th class="pe-0 text-end min-w-100px">PRICE</th>
                                                    <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/10.gif"
                                                            class="w-50px ms-n1" alt="">
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Nike</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-2163</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$64.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$287.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/96.gif"
                                                            class="w-50px ms-n1" alt="">
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Adidas</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-2162</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$76.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$51.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/metronic8/demo1/assets/media/stock/ecommerce/13.gif"
                                                            class="w-50px ms-n1" alt="">
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Puma</a>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item:
                                                            #XDG-1537</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$27.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span
                                                            class="text-gray-800 fw-bold d-block fs-6">$167.00</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--end::Tap pane-->
                            </div>
                            <!--end::Tab Content-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Table widget 2-->
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-xl-6 mb-5 mb-xl-10">
                    <!--begin::Chart widget 4-->
                    <div class="card card-flush overflow-hidden h-md-100">
                        <!--begin::Header-->
                        <div class="card-header py-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Discounted Product Sales</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span>
                            </h3>
                            <!--end::Title-->

                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Menu-->
                                <button
                                    class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                    data-kt-menu-overflow="true">

                                    <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                    <span class="svg-icon svg-icon-1"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                height="20" rx="4" fill="currentColor"></rect>
                                            <rect x="11" y="11" width="2.6" height="2.6"
                                                rx="1.3" fill="currentColor"></rect>
                                            <rect x="15" y="11" width="2.6" height="2.6"
                                                rx="1.3" fill="currentColor"></rect>
                                            <rect x="7" y="11" width="2.6" height="2.6"
                                                rx="1.3" fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>


                                <!--begin::Menu 2-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator mb-3 opacity-75"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            New Ticket
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            New Customer
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                        data-kt-menu-placement="right-start">
                                        <!--begin::Menu item-->
                                        <a href="#" class="menu-link px-3">
                                            <span class="menu-title">New Group</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <!--end::Menu item-->

                                        <!--begin::Menu sub-->
                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">
                                                    Admin Group
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">
                                                    Staff Group
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">
                                                    Member Group
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu sub-->
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            New Contact
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator mt-3 opacity-75"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content px-3 py-3">
                                            <a class="btn btn-primary  btn-sm px-4" href="#">
                                                Generate Reports
                                            </a>
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu 2-->

                                <!--end::Menu-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Card body-->
                        <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                            <!--begin::Info-->
                            <div class="px-9 mb-5">
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Currency-->
                                    <span class="fs-4 fw-semibold text-gray-400 align-self-start me-1">$</span>
                                    <!--end::Currency-->

                                    <!--begin::Value-->
                                    <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">3,706</span>
                                    <!--end::Value-->

                                    <!--begin::Label-->
                                    <span class="badge badge-light-success fs-base">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                        <span class="svg-icon svg-icon-5 svg-icon-success ms-n1"><svg width="24"
                                                height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="11" y="18"
                                                    width="13" height="2" rx="1"
                                                    transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                                <path
                                                    d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon--> 4.5%
                                    </span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Statistics-->

                                <!--begin::Description-->
                                <span class="fs-6 fw-semibold text-gray-400">Total Discounted Sales This Month</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Chart-->
                            <div id="kt_charts_widget_4" class="min-h-auto ps-4 pe-6"
                                style="height: 300px; min-height: 315px;">
                                <div id="apexchartsw6o07da5"
                                    class="apexcharts-canvas apexchartsw6o07da5 apexcharts-theme-light"
                                    style="width: 581.5px; height: 300px;"><svg id="SvgjsSvg1410" width="581.5"
                                        height="300" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                        class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS"
                                        transform="translate(0, 0)" style="background: transparent;">
                                        <g id="SvgjsG1412" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(57.046875, 30)">
                                            <defs id="SvgjsDefs1411">
                                                <clipPath id="gridRectMaskw6o07da5">
                                                    <rect id="SvgjsRect1417" width="521.453125" height="224.82"
                                                        x="-3.5" y="-1.5" rx="0"
                                                        ry="0" opacity="1" stroke-width="0"
                                                        stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMaskw6o07da5"></clipPath>
                                                <clipPath id="nonForecastMaskw6o07da5"></clipPath>
                                                <clipPath id="gridRectMarkerMaskw6o07da5">
                                                    <rect id="SvgjsRect1418" width="518.453125" height="225.82"
                                                        x="-2" y="-2" rx="0"
                                                        ry="0" opacity="1" stroke-width="0"
                                                        stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <linearGradient id="SvgjsLinearGradient1423" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop1424" stop-opacity="0.4"
                                                        stop-color="rgba(0,158,247,0.4)" offset="0"></stop>
                                                    <stop id="SvgjsStop1425" stop-opacity="0"
                                                        stop-color="rgba(255,255,255,0)" offset="0.8"></stop>
                                                    <stop id="SvgjsStop1426" stop-opacity="0"
                                                        stop-color="rgba(255,255,255,0)" offset="1"></stop>
                                                </linearGradient>
                                            </defs>
                                            <g id="SvgjsG1429" class="apexcharts-xaxis"
                                                transform="translate(0, 0)">
                                                <g id="SvgjsG1430" class="apexcharts-xaxis-texts-g"
                                                    transform="translate(0, -10)"><text id="SvgjsText1432"
                                                        font-family="inherit" x="0" y="244.82"
                                                        text-anchor="end" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1433"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1435" font-family="inherit"
                                                        x="28.580729166666664" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1436"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1438" font-family="inherit"
                                                        x="57.161458333333336" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1439"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1441" font-family="inherit"
                                                        x="85.74218750000001" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;"
                                                        transform="rotate(0 86.7421875 239.32000732421875)">
                                                        <tspan id="SvgjsTspan1442">Apr 04</tspan>
                                                        <title>Apr 04</title>
                                                    </text><text id="SvgjsText1444" font-family="inherit"
                                                        x="114.32291666666667" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1445"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1447" font-family="inherit"
                                                        x="142.90364583333331" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1448"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1450" font-family="inherit"
                                                        x="171.48437499999997" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;"
                                                        transform="rotate(0 172.5528793334961 239.32000732421875)">
                                                        <tspan id="SvgjsTspan1451">Apr 07</tspan>
                                                        <title>Apr 07</title>
                                                    </text><text id="SvgjsText1453" font-family="inherit"
                                                        x="200.06510416666663" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1454"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1456" font-family="inherit"
                                                        x="228.6458333333333" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1457"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1459" font-family="inherit"
                                                        x="257.2265625" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;"
                                                        transform="rotate(0 258.2265625 239.32000732421875)">
                                                        <tspan id="SvgjsTspan1460">Apr 10</tspan>
                                                        <title>Apr 10</title>
                                                    </text><text id="SvgjsText1462" font-family="inherit"
                                                        x="285.8072916666667" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1463"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1465" font-family="inherit"
                                                        x="314.38802083333337" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1466"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1468" font-family="inherit"
                                                        x="342.96875000000006" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;"
                                                        transform="rotate(0 343.96875 239.32000732421875)">
                                                        <tspan id="SvgjsTspan1469">Apr 13</tspan>
                                                        <title>Apr 13</title>
                                                    </text><text id="SvgjsText1471" font-family="inherit"
                                                        x="371.54947916666674" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1472"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1474" font-family="inherit"
                                                        x="400.1302083333334" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1475"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1477" font-family="inherit"
                                                        x="428.7109375000001" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;"
                                                        transform="rotate(0 429.7109375 239.32000732421875)">
                                                        <tspan id="SvgjsTspan1478">Apr 18</tspan>
                                                        <title>Apr 18</title>
                                                    </text><text id="SvgjsText1480" font-family="inherit"
                                                        x="457.2916666666668" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1481"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1483" font-family="inherit"
                                                        x="485.8723958333335" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1484"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText1486" font-family="inherit"
                                                        x="514.4531250000001" y="244.82" text-anchor="end"
                                                        dominant-baseline="auto" font-size="12px"
                                                        font-weight="400" fill="#a1a5b7"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: inherit;" transform="rotate(0 1 -1)">
                                                        <tspan id="SvgjsTspan1487"></tspan>
                                                        <title></title>
                                                    </text></g>
                                            </g>
                                            <g id="SvgjsG1511" class="apexcharts-grid">
                                                <g id="SvgjsG1512" class="apexcharts-gridlines-horizontal">
                                                    <line id="SvgjsLine1514" x1="0" y1="0"
                                                        x2="514.453125" y2="0" stroke="#e1e3ea"
                                                        stroke-dasharray="4" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1515" x1="0" y1="36.97"
                                                        x2="514.453125" y2="36.97" stroke="#e1e3ea"
                                                        stroke-dasharray="4" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1516" x1="0" y1="73.94"
                                                        x2="514.453125" y2="73.94" stroke="#e1e3ea"
                                                        stroke-dasharray="4" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1517" x1="0" y1="110.91"
                                                        x2="514.453125" y2="110.91" stroke="#e1e3ea"
                                                        stroke-dasharray="4" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1518" x1="0" y1="147.88"
                                                        x2="514.453125" y2="147.88" stroke="#e1e3ea"
                                                        stroke-dasharray="4" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1519" x1="0" y1="184.85"
                                                        x2="514.453125" y2="184.85" stroke="#e1e3ea"
                                                        stroke-dasharray="4" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1520" x1="0" y1="221.82"
                                                        x2="514.453125" y2="221.82" stroke="#e1e3ea"
                                                        stroke-dasharray="4" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG1513" class="apexcharts-gridlines-vertical"></g>
                                                <line id="SvgjsLine1522" x1="0" y1="221.82"
                                                    x2="514.453125" y2="221.82" stroke="transparent"
                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                <line id="SvgjsLine1521" x1="0" y1="1"
                                                    x2="0" y2="221.82" stroke="transparent"
                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                            </g>
                                            <g id="SvgjsG1419"
                                                class="apexcharts-area-series apexcharts-plot-series">
                                                <g id="SvgjsG1420" class="apexcharts-series" seriesName="Sales"
                                                    data:longestSeries="true" rel="1" data:realIndex="0">
                                                    <path id="SvgjsPath1427"
                                                        d="M 0 221.82L 0 120.99272727272728C 10.003255208333332 120.99272727272728 18.577473958333332 120.99272727272728 28.580729166666664 120.99272727272728C 38.583984375 120.99272727272728 47.158203125 87.38363636363601 57.16145833333333 87.38363636363601C 67.16471354166666 87.38363636363601 75.73893229166667 87.38363636363601 85.7421875 87.38363636363601C 95.74544270833333 87.38363636363601 104.31966145833333 53.77454545454475 114.32291666666666 53.77454545454475C 124.32617187499999 53.77454545454475 132.900390625 53.77454545454475 142.90364583333331 53.77454545454475C 152.90690104166666 53.77454545454475 161.48111979166666 87.38363636363601 171.484375 87.38363636363601C 181.48763020833331 87.38363636363601 190.06184895833331 87.38363636363601 200.06510416666666 87.38363636363601C 210.068359375 87.38363636363601 218.642578125 53.77454545454475 228.64583333333331 53.77454545454475C 238.64908854166666 53.77454545454475 247.22330729166666 53.77454545454475 257.2265625 53.77454545454475C 267.2298177083333 53.77454545454475 275.8040364583333 87.38363636363601 285.80729166666663 87.38363636363601C 295.81054687499994 87.38363636363601 304.384765625 87.38363636363601 314.3880208333333 87.38363636363601C 324.39127604166663 87.38363636363601 332.9654947916667 120.99272727272728 342.96875 120.99272727272728C 352.9720052083333 120.99272727272728 361.5462239583333 120.99272727272728 371.54947916666663 120.99272727272728C 381.55273437499994 120.99272727272728 390.126953125 87.38363636363601 400.1302083333333 87.38363636363601C 410.13346354166663 87.38363636363601 418.7076822916667 87.38363636363601 428.7109375 87.38363636363601C 438.7141927083333 87.38363636363601 447.2884114583333 53.77454545454475 457.29166666666663 53.77454545454475C 467.29492187499994 53.77454545454475 475.869140625 53.77454545454475 485.8723958333333 53.77454545454475C 495.87565104166663 53.77454545454475 504.4498697916667 87.38363636363601 514.453125 87.38363636363601C 514.453125 87.38363636363601 514.453125 87.38363636363601 514.453125 221.82M 514.453125 87.38363636363601z"
                                                        fill="url(#SvgjsLinearGradient1423)" fill-opacity="1"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0" class="apexcharts-area"
                                                        index="0" clip-path="url(#gridRectMaskw6o07da5)"
                                                        pathTo="M 0 221.82L 0 120.99272727272728C 10.003255208333332 120.99272727272728 18.577473958333332 120.99272727272728 28.580729166666664 120.99272727272728C 38.583984375 120.99272727272728 47.158203125 87.38363636363601 57.16145833333333 87.38363636363601C 67.16471354166666 87.38363636363601 75.73893229166667 87.38363636363601 85.7421875 87.38363636363601C 95.74544270833333 87.38363636363601 104.31966145833333 53.77454545454475 114.32291666666666 53.77454545454475C 124.32617187499999 53.77454545454475 132.900390625 53.77454545454475 142.90364583333331 53.77454545454475C 152.90690104166666 53.77454545454475 161.48111979166666 87.38363636363601 171.484375 87.38363636363601C 181.48763020833331 87.38363636363601 190.06184895833331 87.38363636363601 200.06510416666666 87.38363636363601C 210.068359375 87.38363636363601 218.642578125 53.77454545454475 228.64583333333331 53.77454545454475C 238.64908854166666 53.77454545454475 247.22330729166666 53.77454545454475 257.2265625 53.77454545454475C 267.2298177083333 53.77454545454475 275.8040364583333 87.38363636363601 285.80729166666663 87.38363636363601C 295.81054687499994 87.38363636363601 304.384765625 87.38363636363601 314.3880208333333 87.38363636363601C 324.39127604166663 87.38363636363601 332.9654947916667 120.99272727272728 342.96875 120.99272727272728C 352.9720052083333 120.99272727272728 361.5462239583333 120.99272727272728 371.54947916666663 120.99272727272728C 381.55273437499994 120.99272727272728 390.126953125 87.38363636363601 400.1302083333333 87.38363636363601C 410.13346354166663 87.38363636363601 418.7076822916667 87.38363636363601 428.7109375 87.38363636363601C 438.7141927083333 87.38363636363601 447.2884114583333 53.77454545454475 457.29166666666663 53.77454545454475C 467.29492187499994 53.77454545454475 475.869140625 53.77454545454475 485.8723958333333 53.77454545454475C 495.87565104166663 53.77454545454475 504.4498697916667 87.38363636363601 514.453125 87.38363636363601C 514.453125 87.38363636363601 514.453125 87.38363636363601 514.453125 221.82M 514.453125 87.38363636363601z"
                                                        pathFrom="M -1 2440.020000000012L -1 2440.020000000012L 28.580729166666664 2440.020000000012L 57.16145833333333 2440.020000000012L 85.7421875 2440.020000000012L 114.32291666666666 2440.020000000012L 142.90364583333331 2440.020000000012L 171.484375 2440.020000000012L 200.06510416666666 2440.020000000012L 228.64583333333331 2440.020000000012L 257.2265625 2440.020000000012L 285.80729166666663 2440.020000000012L 314.3880208333333 2440.020000000012L 342.96875 2440.020000000012L 371.54947916666663 2440.020000000012L 400.1302083333333 2440.020000000012L 428.7109375 2440.020000000012L 457.29166666666663 2440.020000000012L 485.8723958333333 2440.020000000012L 514.453125 2440.020000000012">
                                                    </path>
                                                    <path id="SvgjsPath1428"
                                                        d="M 0 120.99272727272728C 10.003255208333332 120.99272727272728 18.577473958333332 120.99272727272728 28.580729166666664 120.99272727272728C 38.583984375 120.99272727272728 47.158203125 87.38363636363601 57.16145833333333 87.38363636363601C 67.16471354166666 87.38363636363601 75.73893229166667 87.38363636363601 85.7421875 87.38363636363601C 95.74544270833333 87.38363636363601 104.31966145833333 53.77454545454475 114.32291666666666 53.77454545454475C 124.32617187499999 53.77454545454475 132.900390625 53.77454545454475 142.90364583333331 53.77454545454475C 152.90690104166666 53.77454545454475 161.48111979166666 87.38363636363601 171.484375 87.38363636363601C 181.48763020833331 87.38363636363601 190.06184895833331 87.38363636363601 200.06510416666666 87.38363636363601C 210.068359375 87.38363636363601 218.642578125 53.77454545454475 228.64583333333331 53.77454545454475C 238.64908854166666 53.77454545454475 247.22330729166666 53.77454545454475 257.2265625 53.77454545454475C 267.2298177083333 53.77454545454475 275.8040364583333 87.38363636363601 285.80729166666663 87.38363636363601C 295.81054687499994 87.38363636363601 304.384765625 87.38363636363601 314.3880208333333 87.38363636363601C 324.39127604166663 87.38363636363601 332.9654947916667 120.99272727272728 342.96875 120.99272727272728C 352.9720052083333 120.99272727272728 361.5462239583333 120.99272727272728 371.54947916666663 120.99272727272728C 381.55273437499994 120.99272727272728 390.126953125 87.38363636363601 400.1302083333333 87.38363636363601C 410.13346354166663 87.38363636363601 418.7076822916667 87.38363636363601 428.7109375 87.38363636363601C 438.7141927083333 87.38363636363601 447.2884114583333 53.77454545454475 457.29166666666663 53.77454545454475C 467.29492187499994 53.77454545454475 475.869140625 53.77454545454475 485.8723958333333 53.77454545454475C 495.87565104166663 53.77454545454475 504.4498697916667 87.38363636363601 514.453125 87.38363636363601"
                                                        fill="none" fill-opacity="1" stroke="#009ef7"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="3"
                                                        stroke-dasharray="0" class="apexcharts-area"
                                                        index="0" clip-path="url(#gridRectMaskw6o07da5)"
                                                        pathTo="M 0 120.99272727272728C 10.003255208333332 120.99272727272728 18.577473958333332 120.99272727272728 28.580729166666664 120.99272727272728C 38.583984375 120.99272727272728 47.158203125 87.38363636363601 57.16145833333333 87.38363636363601C 67.16471354166666 87.38363636363601 75.73893229166667 87.38363636363601 85.7421875 87.38363636363601C 95.74544270833333 87.38363636363601 104.31966145833333 53.77454545454475 114.32291666666666 53.77454545454475C 124.32617187499999 53.77454545454475 132.900390625 53.77454545454475 142.90364583333331 53.77454545454475C 152.90690104166666 53.77454545454475 161.48111979166666 87.38363636363601 171.484375 87.38363636363601C 181.48763020833331 87.38363636363601 190.06184895833331 87.38363636363601 200.06510416666666 87.38363636363601C 210.068359375 87.38363636363601 218.642578125 53.77454545454475 228.64583333333331 53.77454545454475C 238.64908854166666 53.77454545454475 247.22330729166666 53.77454545454475 257.2265625 53.77454545454475C 267.2298177083333 53.77454545454475 275.8040364583333 87.38363636363601 285.80729166666663 87.38363636363601C 295.81054687499994 87.38363636363601 304.384765625 87.38363636363601 314.3880208333333 87.38363636363601C 324.39127604166663 87.38363636363601 332.9654947916667 120.99272727272728 342.96875 120.99272727272728C 352.9720052083333 120.99272727272728 361.5462239583333 120.99272727272728 371.54947916666663 120.99272727272728C 381.55273437499994 120.99272727272728 390.126953125 87.38363636363601 400.1302083333333 87.38363636363601C 410.13346354166663 87.38363636363601 418.7076822916667 87.38363636363601 428.7109375 87.38363636363601C 438.7141927083333 87.38363636363601 447.2884114583333 53.77454545454475 457.29166666666663 53.77454545454475C 467.29492187499994 53.77454545454475 475.869140625 53.77454545454475 485.8723958333333 53.77454545454475C 495.87565104166663 53.77454545454475 504.4498697916667 87.38363636363601 514.453125 87.38363636363601"
                                                        pathFrom="M -1 2440.020000000012L -1 2440.020000000012L 28.580729166666664 2440.020000000012L 57.16145833333333 2440.020000000012L 85.7421875 2440.020000000012L 114.32291666666666 2440.020000000012L 142.90364583333331 2440.020000000012L 171.484375 2440.020000000012L 200.06510416666666 2440.020000000012L 228.64583333333331 2440.020000000012L 257.2265625 2440.020000000012L 285.80729166666663 2440.020000000012L 314.3880208333333 2440.020000000012L 342.96875 2440.020000000012L 371.54947916666663 2440.020000000012L 400.1302083333333 2440.020000000012L 428.7109375 2440.020000000012L 457.29166666666663 2440.020000000012L 485.8723958333333 2440.020000000012L 514.453125 2440.020000000012"
                                                        fill-rule="evenodd"></path>
                                                    <g id="SvgjsG1421" class="apexcharts-series-markers-wrap"
                                                        data:realIndex="0">
                                                        <g class="apexcharts-series-markers">
                                                            <circle id="SvgjsCircle1530" r="0"
                                                                cx="0" cy="0"
                                                                class="apexcharts-marker wgi8629as no-pointer-events"
                                                                stroke="#009ef7" fill="#009ef7" fill-opacity="1"
                                                                stroke-width="3" stroke-opacity="0.9"
                                                                default-marker-size="0"></circle>
                                                        </g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1422" class="apexcharts-datalabels"
                                                    data:realIndex="0"></g>
                                            </g>
                                            <line id="SvgjsLine1524" x1="0" y1="0"
                                                x2="0" y2="221.82" stroke="#009ef7"
                                                stroke-dasharray="3" stroke-linecap="butt"
                                                class="apexcharts-xcrosshairs" x="0" y="0"
                                                width="1" height="221.82" fill="#b1b9c4" filter="none"
                                                fill-opacity="0.9" stroke-width="1"></line>
                                            <line id="SvgjsLine1525" x1="0" y1="0"
                                                x2="514.453125" y2="0" stroke="#b6b6b6"
                                                stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine1526" x1="0" y1="0"
                                                x2="514.453125" y2="0" stroke-dasharray="0"
                                                stroke-width="0" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG1527" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG1528" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG1529" class="apexcharts-point-annotations"></g>
                                            <rect id="SvgjsRect1531" width="0" height="0"
                                                x="0" y="0" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none"
                                                stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect">
                                            </rect>
                                            <rect id="SvgjsRect1532" width="0" height="0"
                                                x="0" y="0" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none"
                                                stroke-dasharray="0" fill="#fefefe"
                                                class="apexcharts-selection-rect"></rect>
                                        </g>
                                        <g id="SvgjsG1488" class="apexcharts-yaxis" rel="0"
                                            transform="translate(27.046875, 0)">
                                            <g id="SvgjsG1489" class="apexcharts-yaxis-texts-g"><text
                                                    id="SvgjsText1491" font-family="inherit" x="20"
                                                    y="31.6" text-anchor="end" dominant-baseline="auto"
                                                    font-size="12px" font-weight="400" fill="#a1a5b7"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: inherit;">
                                                    <tspan id="SvgjsTspan1492">$362</tspan>
                                                    <title>$362</title>
                                                </text><text id="SvgjsText1494" font-family="inherit"
                                                    x="20" y="68.57" text-anchor="end"
                                                    dominant-baseline="auto" font-size="12px" font-weight="400"
                                                    fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: inherit;">
                                                    <tspan id="SvgjsTspan1495">$357</tspan>
                                                    <title>$357</title>
                                                </text><text id="SvgjsText1497" font-family="inherit"
                                                    x="20" y="105.53999999999999" text-anchor="end"
                                                    dominant-baseline="auto" font-size="12px" font-weight="400"
                                                    fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: inherit;">
                                                    <tspan id="SvgjsTspan1498">$351</tspan>
                                                    <title>$351</title>
                                                </text><text id="SvgjsText1500" font-family="inherit"
                                                    x="20" y="142.51" text-anchor="end"
                                                    dominant-baseline="auto" font-size="12px" font-weight="400"
                                                    fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: inherit;">
                                                    <tspan id="SvgjsTspan1501">$346</tspan>
                                                    <title>$346</title>
                                                </text><text id="SvgjsText1503" font-family="inherit"
                                                    x="20" y="179.48" text-anchor="end"
                                                    dominant-baseline="auto" font-size="12px" font-weight="400"
                                                    fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: inherit;">
                                                    <tspan id="SvgjsTspan1504">$340</tspan>
                                                    <title>$340</title>
                                                </text><text id="SvgjsText1506" font-family="inherit"
                                                    x="20" y="216.45" text-anchor="end"
                                                    dominant-baseline="auto" font-size="12px" font-weight="400"
                                                    fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: inherit;">
                                                    <tspan id="SvgjsTspan1507">$335</tspan>
                                                    <title>$335</title>
                                                </text><text id="SvgjsText1509" font-family="inherit"
                                                    x="20" y="253.42" text-anchor="end"
                                                    dominant-baseline="auto" font-size="12px" font-weight="400"
                                                    fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: inherit;">
                                                    <tspan id="SvgjsTspan1510">$330</tspan>
                                                    <title>$330</title>
                                                </text></g>
                                        </g>
                                        <rect id="SvgjsRect1523" width="0" height="0" x="0"
                                            y="0" rx="0" ry="0" opacity="1"
                                            stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe">
                                        </rect>
                                        <g id="SvgjsG1413" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-legend" style="max-height: 150px;"></div>
                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                        <div class="apexcharts-tooltip-title"
                                            style="font-family: inherit; font-size: 12px;"></div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(0, 158, 247);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: inherit; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                        <div class="apexcharts-xaxistooltip-text"
                                            style="font-family: inherit; font-size: 12px;"></div>
                                    </div>
                                    <div
                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Chart widget 4-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xl-4 mb-xl-10">

                    <!--begin::Engage widget 1-->
                    <div class="card h-md-100" dir="ltr">
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column flex-center">
                            <!--begin::Heading-->
                            <div class="mb-2">
                                <!--begin::Title-->
                                <h1 class="fw-semibold text-gray-800 text-center lh-lg">
                                    Have you tried <br> new
                                    <span class="fw-bolder"> eCommerce App ?</span>
                                </h1>
                                <!--end::Title-->

                                <!--begin::Illustration-->
                                <div class="py-10 text-center">
                                    <img src="/metronic8/demo1/assets/media/svg/illustrations/easy/2.svg"
                                        class="theme-light-show w-200px" alt="">
                                    <img src="/metronic8/demo1/assets/media/svg/illustrations/easy/2-dark.svg"
                                        class="theme-dark-show w-200px" alt="">
                                </div>
                                <!--end::Illustration-->
                            </div>
                            <!--end::Heading-->

                            <!--begin::Links-->
                            <div class="text-center mb-1">
                                <!--begin::Link-->
                                <a class="btn btn-sm btn-primary me-2"
                                    href="/metronic8/demo1/../demo1/apps/ecommerce/sales/listing.html">
                                    View App </a>
                                <!--end::Link-->

                                <!--begin::Link-->
                                <a class="btn btn-sm btn-light"
                                    href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/add-product.html">
                                    New Product </a>
                                <!--end::Link-->
                            </div>
                            <!--end::Links-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Engage widget 1-->

                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-xl-8 mb-5 mb-xl-10">

                    <!--begin::Table Widget 4-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Card header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Product Orders</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Avg. 57 orders per day</span>
                            </h3>
                            <!--end::Title-->

                            <!--begin::Actions-->
                            <div class="card-toolbar">
                                <!--begin::Filters-->
                                <div class="d-flex flex-stack flex-wrap gap-4">
                                    <!--begin::Destination-->
                                    <div class="d-flex align-items-center fw-bold">
                                        <!--begin::Label-->
                                        <div class="text-gray-400 fs-7 me-2">Cateogry</div>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select
                                            class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto select2-hidden-accessible"
                                            data-control="select2" data-hide-search="true"
                                            data-dropdown-css-class="w-150px" data-placeholder="Select an option"
                                            data-select2-id="select2-data-7-8lpr" tabindex="-1"
                                            aria-hidden="true" data-kt-initialized="1">
                                            <option></option>
                                            <option value="Show All" selected=""
                                                data-select2-id="select2-data-9-j6f2">Show All</option>
                                            <option value="a">Category A</option>
                                            <option value="b">Category A</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap5"
                                            dir="ltr" data-select2-id="select2-data-8-jn33"
                                            style="width: 100%;"><span class="selection"><span
                                                    class="select2-selection select2-selection--single form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto"
                                                    role="combobox" aria-haspopup="true" aria-expanded="false"
                                                    tabindex="0" aria-disabled="false"
                                                    aria-labelledby="select2-ryzj-container"
                                                    aria-controls="select2-ryzj-container"><span
                                                        class="select2-selection__rendered"
                                                        id="select2-ryzj-container" role="textbox"
                                                        aria-readonly="true" title="Show All">Show All</span><span
                                                        class="select2-selection__arrow" role="presentation"><b
                                                            role="presentation"></b></span></span></span><span
                                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Destination-->

                                    <!--begin::Status-->
                                    <div class="d-flex align-items-center fw-bold">
                                        <!--begin::Label-->
                                        <div class="text-gray-400 fs-7 me-2">Status</div>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select
                                            class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto select2-hidden-accessible"
                                            data-control="select2" data-hide-search="true"
                                            data-dropdown-css-class="w-150px" data-placeholder="Select an option"
                                            data-kt-table-widget-4="filter_status"
                                            data-select2-id="select2-data-10-eb8b" tabindex="-1"
                                            aria-hidden="true" data-kt-initialized="1">
                                            <option></option>
                                            <option value="Show All" selected=""
                                                data-select2-id="select2-data-12-qfkb">Show All</option>
                                            <option value="Shipped">Shipped</option>
                                            <option value="Confirmed">Confirmed</option>
                                            <option value="Rejected">Rejected</option>
                                            <option value="Pending">Pending</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap5"
                                            dir="ltr" data-select2-id="select2-data-11-rdp2"
                                            style="width: 100%;"><span class="selection"><span
                                                    class="select2-selection select2-selection--single form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                    role="combobox" aria-haspopup="true" aria-expanded="false"
                                                    tabindex="0" aria-disabled="false"
                                                    aria-labelledby="select2-gfmz-container"
                                                    aria-controls="select2-gfmz-container"><span
                                                        class="select2-selection__rendered"
                                                        id="select2-gfmz-container" role="textbox"
                                                        aria-readonly="true" title="Show All">Show All</span><span
                                                        class="select2-selection__arrow" role="presentation"><b
                                                            role="presentation"></b></span></span></span><span
                                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Status-->

                                    <!--begin::Search-->
                                    <div class="position-relative my-1">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                        <span
                                            class="svg-icon svg-icon-2 position-absolute top-50 translate-middle-y ms-4"><svg
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="17.0365" y="15.1223"
                                                    width="8.15546" height="2" rx="1"
                                                    transform="rotate(45 17.0365 15.1223)" fill="currentColor">
                                                </rect>
                                                <path
                                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon--> <input type="text" data-kt-table-widget-4="search"
                                            class="form-control w-150px fs-7 ps-12" placeholder="Search">
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--begin::Filters-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-2">
                            <!--begin::Table-->
                            <div id="kt_table_widget_4_table_wrapper"
                                class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-3 dataTable no-footer"
                                        id="kt_table_widget_4_table">
                                        <!--begin::Table head-->
                                        <thead>
                                            <!--begin::Table row-->
                                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="min-w-100px sorting_disabled" rowspan="1"
                                                    colspan="1" style="width: 102.094px;">Order ID</th>
                                                <th class="text-end min-w-100px sorting_disabled" rowspan="1"
                                                    colspan="1" style="width: 102.281px;">Created</th>
                                                <th class="text-end min-w-125px sorting_disabled" rowspan="1"
                                                    colspan="1" style="width: 127.766px;">Customer</th>
                                                <th class="text-end min-w-100px sorting_disabled" rowspan="1"
                                                    colspan="1" style="width: 102.281px;">Total</th>
                                                <th class="text-end min-w-100px sorting_disabled" rowspan="1"
                                                    colspan="1" style="width: 102.281px;">Profit</th>
                                                <th class="text-end min-w-50px sorting_disabled" rowspan="1"
                                                    colspan="1" style="width: 91.2344px;">Status</th>
                                                <th class="text-end sorting_disabled" rowspan="1"
                                                    colspan="1" style="width: 25.7188px;"></th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->

                                        <!--begin::Table body-->
                                        <tbody class="fw-bold text-gray-600">









                                            <tr class="odd">
                                                <td>
                                                    <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-gray-800 text-hover-primary">#XGY-346</a>
                                                </td>

                                                <td class="text-end">
                                                    7 min ago
                                                </td>

                                                <td class="text-end">
                                                    <a href="#"
                                                        class="text-gray-600 text-hover-primary">Albert Flores</a>
                                                </td>

                                                <td class="text-end">
                                                    $630.00 </td>

                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bolder">$86.70</span>
                                                </td>

                                                <td class="text-end">
                                                    <span
                                                        class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span>
                                                </td>

                                                <td class="text-end">
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                        data-kt-table-widget-4="expand_row">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-off"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="11" y="18"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-90 11 18)"
                                                                    fill="currentColor"></rect>
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor"></rect>
                                                            </svg></span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-on"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor"></rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td>
                                                    <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-gray-800 text-hover-primary">#YHD-047</a>
                                                </td>

                                                <td class="text-end">
                                                    52 min ago
                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="text-gray-600 text-hover-primary">Jenny
                                                        Wilson</a>
                                                </td>

                                                <td class="text-end">
                                                    $25.00 </td>

                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bolder">$4.20</span>
                                                </td>

                                                <td class="text-end">
                                                    <span
                                                        class="badge py-3 px-4 fs-7 badge-light-primary">Confirmed</span>
                                                </td>

                                                <td class="text-end">
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                        data-kt-table-widget-4="expand_row">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-off"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="11" y="18"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-90 11 18)"
                                                                    fill="currentColor"></rect>
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor"></rect>
                                                            </svg></span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-on"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor"></rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td>
                                                    <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-gray-800 text-hover-primary">#SRR-678</a>
                                                </td>

                                                <td class="text-end">
                                                    1 hour ago
                                                </td>

                                                <td class="text-end">
                                                    <a href="#"
                                                        class="text-gray-600 text-hover-primary">Robert Fox</a>
                                                </td>

                                                <td class="text-end">
                                                    $1,630.00 </td>

                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bolder">$203.90</span>
                                                </td>

                                                <td class="text-end">
                                                    <span
                                                        class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span>
                                                </td>

                                                <td class="text-end">
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                        data-kt-table-widget-4="expand_row">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-off"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="11" y="18"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-90 11 18)"
                                                                    fill="currentColor"></rect>
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor"></rect>
                                                            </svg></span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-on"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor"></rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td>
                                                    <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-gray-800 text-hover-primary">#PXF-534</a>
                                                </td>

                                                <td class="text-end">
                                                    3 hour ago
                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="text-gray-600 text-hover-primary">Cody
                                                        Fisher</a>
                                                </td>

                                                <td class="text-end">
                                                    $119.00 </td>

                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bolder">$12.00</span>
                                                </td>

                                                <td class="text-end">
                                                    <span
                                                        class="badge py-3 px-4 fs-7 badge-light-success">Shipped</span>
                                                </td>

                                                <td class="text-end">
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                        data-kt-table-widget-4="expand_row">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-off"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="11" y="18"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-90 11 18)"
                                                                    fill="currentColor"></rect>
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor"></rect>
                                                            </svg></span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-on"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor"></rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td>
                                                    <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-gray-800 text-hover-primary">#XGD-249</a>
                                                </td>

                                                <td class="text-end">
                                                    2 day ago
                                                </td>

                                                <td class="text-end">
                                                    <a href="#"
                                                        class="text-gray-600 text-hover-primary">Arlene McCoy</a>
                                                </td>

                                                <td class="text-end">
                                                    $660.00 </td>

                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bolder">$52.26</span>
                                                </td>

                                                <td class="text-end">
                                                    <span
                                                        class="badge py-3 px-4 fs-7 badge-light-success">Shipped</span>
                                                </td>

                                                <td class="text-end">
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                        data-kt-table-widget-4="expand_row">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-off"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="11" y="18"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-90 11 18)"
                                                                    fill="currentColor"></rect>
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor"></rect>
                                                            </svg></span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-on"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor"></rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td>
                                                    <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-gray-800 text-hover-primary">#SKP-035</a>
                                                </td>

                                                <td class="text-end">
                                                    2 day ago
                                                </td>

                                                <td class="text-end">
                                                    <a href="#"
                                                        class="text-gray-600 text-hover-primary">Eleanor Pena</a>
                                                </td>

                                                <td class="text-end">
                                                    $290.00 </td>

                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bolder">$29.00</span>
                                                </td>

                                                <td class="text-end">
                                                    <span
                                                        class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span>
                                                </td>

                                                <td class="text-end">
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                        data-kt-table-widget-4="expand_row">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-off"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="11" y="18"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-90 11 18)"
                                                                    fill="currentColor"></rect>
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor"></rect>
                                                            </svg></span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-on"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor"></rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td>
                                                    <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-gray-800 text-hover-primary">#SKP-567</a>
                                                </td>

                                                <td class="text-end">
                                                    7 min ago
                                                </td>

                                                <td class="text-end">
                                                    <a href="#" class="text-gray-600 text-hover-primary">Dan
                                                        Wilson</a>
                                                </td>

                                                <td class="text-end">
                                                    $590.00 </td>

                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bolder">$50.00</span>
                                                </td>

                                                <td class="text-end">
                                                    <span
                                                        class="badge py-3 px-4 fs-7 badge-light-success">Shipped</span>
                                                </td>

                                                <td class="text-end">
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                        data-kt-table-widget-4="expand_row">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-off"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="11" y="18"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-90 11 18)"
                                                                    fill="currentColor"></rect>
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor"></rect>
                                                            </svg></span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-on"><svg
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1"
                                                                    fill="currentColor"></rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                </div>
                                <div class="row">
                                    <div
                                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                    </div>
                                    <div
                                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                    </div>
                                </div>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Table Widget 4-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xl-4">

                    <!--begin::List widget 5-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Product Delivery</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">1M Products Shipped so far</span>
                            </h3>
                            <!--end::Title-->

                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <a href="/metronic8/demo1/../demo1/apps/ecommerce/sales/details.html"
                                    class="btn btn-sm btn-light">Order Details</a>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Scroll-->
                            <div class="hover-scroll-overlay-y pe-6 me-n6" style="height: 415px">
                                <!--begin::Item-->
                                <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-stack mb-3">
                                        <!--begin::Wrapper-->
                                        <div class="me-3">
                                            <!--begin::Icon-->
                                            <img src="/metronic8/demo1/assets/media/stock/ecommerce/210.gif"
                                                class="w-50px ms-n1 me-1" alt="">
                                            <!--end::Icon-->

                                            <!--begin::Title-->
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                class="text-gray-800 text-hover-primary fw-bold">Elephant 1802</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Action-->
                                        <div class="m-0">
                                            <!--begin::Menu-->
                                            <button
                                                class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-overflow="true">

                                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                                <span class="svg-icon svg-icon-1"><svg width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="4"
                                                            fill="currentColor"></rect>
                                                        <rect x="11" y="11" width="2.6"
                                                            height="2.6" rx="1.3" fill="currentColor">
                                                        </rect>
                                                        <rect x="15" y="11" width="2.6"
                                                            height="2.6" rx="1.3" fill="currentColor">
                                                        </rect>
                                                        <rect x="7" y="11" width="2.6"
                                                            height="2.6" rx="1.3" fill="currentColor">
                                                        </rect>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>

                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick
                                                        Actions</div>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        New Ticket
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        New Customer
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                    data-kt-menu-placement="right-start">
                                                    <!--begin::Menu item-->
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Admin Group
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Staff Group
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Member Group
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        New Contact
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary  btn-sm px-4" href="#">
                                                            Generate Reports
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 2-->

                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Info-->

                                    <!--begin::Customer-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Name-->
                                        <span class="text-gray-400 fw-bold">To:
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/sales/details.html"
                                                class="text-gray-800 text-hover-primary fw-bold">
                                                Jason Bourne </a>
                                        </span>
                                        <!--end::Name-->

                                        <!--begin::Label-->
                                        <span class="badge badge-light-success">Delivered</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Customer-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-stack mb-3">
                                        <!--begin::Wrapper-->
                                        <div class="me-3">
                                            <!--begin::Icon-->
                                            <img src="/metronic8/demo1/assets/media/stock/ecommerce/209.gif"
                                                class="w-50px ms-n1 me-1" alt="">
                                            <!--end::Icon-->

                                            <!--begin::Title-->
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                class="text-gray-800 text-hover-primary fw-bold">RiseUP</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Action-->
                                        <div class="m-0">
                                            <!--begin::Menu-->
                                            <button
                                                class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-overflow="true">

                                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                                <span class="svg-icon svg-icon-1"><svg width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="4"
                                                            fill="currentColor"></rect>
                                                        <rect x="11" y="11" width="2.6"
                                                            height="2.6" rx="1.3" fill="currentColor">
                                                        </rect>
                                                        <rect x="15" y="11" width="2.6"
                                                            height="2.6" rx="1.3" fill="currentColor">
                                                        </rect>
                                                        <rect x="7" y="11" width="2.6"
                                                            height="2.6" rx="1.3" fill="currentColor">
                                                        </rect>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>

                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick
                                                        Actions</div>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        New Ticket
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        New Customer
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                    data-kt-menu-placement="right-start">
                                                    <!--begin::Menu item-->
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Admin Group
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Staff Group
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Member Group
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        New Contact
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary  btn-sm px-4" href="#">
                                                            Generate Reports
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 2-->

                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Info-->

                                    <!--begin::Customer-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Name-->
                                        <span class="text-gray-400 fw-bold">To:
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/sales/details.html"
                                                class="text-gray-800 text-hover-primary fw-bold">
                                                Marie Durant </a>
                                        </span>
                                        <!--end::Name-->

                                        <!--begin::Label-->
                                        <span class="badge badge-light-primary">Shipping</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Customer-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-stack mb-3">
                                        <!--begin::Wrapper-->
                                        <div class="me-3">
                                            <!--begin::Icon-->
                                            <img src="/metronic8/demo1/assets/media/stock/ecommerce/214.gif"
                                                class="w-50px ms-n1 me-1" alt="">
                                            <!--end::Icon-->

                                            <!--begin::Title-->
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                class="text-gray-800 text-hover-primary fw-bold">Yellow Stone</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Action-->
                                        <div class="m-0">
                                            <!--begin::Menu-->
                                            <button
                                                class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-overflow="true">

                                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                                <span class="svg-icon svg-icon-1"><svg width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="4"
                                                            fill="currentColor"></rect>
                                                        <rect x="11" y="11" width="2.6"
                                                            height="2.6" rx="1.3" fill="currentColor">
                                                        </rect>
                                                        <rect x="15" y="11" width="2.6"
                                                            height="2.6" rx="1.3" fill="currentColor">
                                                        </rect>
                                                        <rect x="7" y="11" width="2.6"
                                                            height="2.6" rx="1.3" fill="currentColor">
                                                        </rect>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>

                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick
                                                        Actions</div>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        New Ticket
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        New Customer
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                    data-kt-menu-placement="right-start">
                                                    <!--begin::Menu item-->
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Admin Group
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Staff Group
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Member Group
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        New Contact
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary  btn-sm px-4" href="#">
                                                            Generate Reports
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 2-->

                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Info-->

                                    <!--begin::Customer-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Name-->
                                        <span class="text-gray-400 fw-bold">To:
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/sales/details.html"
                                                class="text-gray-800 text-hover-primary fw-bold">
                                                Dan Wilson </a>
                                        </span>
                                        <!--end::Name-->

                                        <!--begin::Label-->
                                        <span class="badge badge-light-danger">Confirmed</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Customer-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-stack mb-3">
                                        <!--begin::Wrapper-->
                                        <div class="me-3">
                                            <!--begin::Icon-->
                                            <img src="/metronic8/demo1/assets/media/stock/ecommerce/211.gif"
                                                class="w-50px ms-n1 me-1" alt="">
                                            <!--end::Icon-->

                                            <!--begin::Title-->
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                class="text-gray-800 text-hover-primary fw-bold">Elephant 1802</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Action-->
                                        <div class="m-0">
                                            <!--begin::Menu-->
                                            <button
                                                class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-overflow="true">

                                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                                <span class="svg-icon svg-icon-1"><svg width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="4"
                                                            fill="currentColor"></rect>
                                                        <rect x="11" y="11" width="2.6"
                                                            height="2.6" rx="1.3" fill="currentColor">
                                                        </rect>
                                                        <rect x="15" y="11" width="2.6"
                                                            height="2.6" rx="1.3" fill="currentColor">
                                                        </rect>
                                                        <rect x="7" y="11" width="2.6"
                                                            height="2.6" rx="1.3" fill="currentColor">
                                                        </rect>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>

                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick
                                                        Actions</div>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        New Ticket
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        New Customer
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                    data-kt-menu-placement="right-start">
                                                    <!--begin::Menu item-->
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Admin Group
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Staff Group
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Member Group
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        New Contact
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary  btn-sm px-4" href="#">
                                                            Generate Reports
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 2-->

                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Info-->

                                    <!--begin::Customer-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Name-->
                                        <span class="text-gray-400 fw-bold">To:
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/sales/details.html"
                                                class="text-gray-800 text-hover-primary fw-bold">
                                                Lebron Wayde </a>
                                        </span>
                                        <!--end::Name-->

                                        <!--begin::Label-->
                                        <span class="badge badge-light-success">Delivered</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Customer-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-stack mb-3">
                                        <!--begin::Wrapper-->
                                        <div class="me-3">
                                            <!--begin::Icon-->
                                            <img src="/metronic8/demo1/assets/media/stock/ecommerce/215.gif"
                                                class="w-50px ms-n1 me-1" alt="">
                                            <!--end::Icon-->

                                            <!--begin::Title-->
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                class="text-gray-800 text-hover-primary fw-bold">RiseUP</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Action-->
                                        <div class="m-0">
                                            <!--begin::Menu-->
                                            <button
                                                class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-overflow="true">

                                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                                <span class="svg-icon svg-icon-1"><svg width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="4"
                                                            fill="currentColor"></rect>
                                                        <rect x="11" y="11" width="2.6"
                                                            height="2.6" rx="1.3" fill="currentColor">
                                                        </rect>
                                                        <rect x="15" y="11" width="2.6"
                                                            height="2.6" rx="1.3" fill="currentColor">
                                                        </rect>
                                                        <rect x="7" y="11" width="2.6"
                                                            height="2.6" rx="1.3" fill="currentColor">
                                                        </rect>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>

                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick
                                                        Actions</div>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        New Ticket
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        New Customer
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                    data-kt-menu-placement="right-start">
                                                    <!--begin::Menu item-->
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Admin Group
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Staff Group
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Member Group
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        New Contact
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary  btn-sm px-4" href="#">
                                                            Generate Reports
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 2-->

                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Info-->

                                    <!--begin::Customer-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Name-->
                                        <span class="text-gray-400 fw-bold">To:
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/sales/details.html"
                                                class="text-gray-800 text-hover-primary fw-bold">
                                                Ana Simmons </a>
                                        </span>
                                        <!--end::Name-->

                                        <!--begin::Label-->
                                        <span class="badge badge-light-primary">Shipping</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Customer-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="border border-dashed border-gray-300 rounded px-7 py-3 ">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-stack mb-3">
                                        <!--begin::Wrapper-->
                                        <div class="me-3">
                                            <!--begin::Icon-->
                                            <img src="/metronic8/demo1/assets/media/stock/ecommerce/192.gif"
                                                class="w-50px ms-n1 me-1" alt="">
                                            <!--end::Icon-->

                                            <!--begin::Title-->
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                class="text-gray-800 text-hover-primary fw-bold">Yellow Stone</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Action-->
                                        <div class="m-0">
                                            <!--begin::Menu-->
                                            <button
                                                class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-overflow="true">

                                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                                <span class="svg-icon svg-icon-1"><svg width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="4"
                                                            fill="currentColor"></rect>
                                                        <rect x="11" y="11" width="2.6"
                                                            height="2.6" rx="1.3" fill="currentColor">
                                                        </rect>
                                                        <rect x="15" y="11" width="2.6"
                                                            height="2.6" rx="1.3" fill="currentColor">
                                                        </rect>
                                                        <rect x="7" y="11" width="2.6"
                                                            height="2.6" rx="1.3" fill="currentColor">
                                                        </rect>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>

                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick
                                                        Actions</div>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        New Ticket
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        New Customer
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                    data-kt-menu-placement="right-start">
                                                    <!--begin::Menu item-->
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Admin Group
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Staff Group
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Member Group
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        New Contact
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary  btn-sm px-4" href="#">
                                                            Generate Reports
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 2-->

                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Info-->

                                    <!--begin::Customer-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Name-->
                                        <span class="text-gray-400 fw-bold">To:
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/sales/details.html"
                                                class="text-gray-800 text-hover-primary fw-bold">
                                                Kevin Leonard </a>
                                        </span>
                                        <!--end::Name-->

                                        <!--begin::Label-->
                                        <span class="badge badge-light-danger">Confirmed</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Customer-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Scroll-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List widget 5-->


                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-xl-8">

                    <!--begin::Table Widget 5-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Card header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Stock Report</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Total 2,356 Items in the
                                    Stock</span>
                            </h3>
                            <!--end::Title-->

                            <!--begin::Actions-->
                            <div class="card-toolbar">
                                <!--begin::Filters-->
                                <div class="d-flex flex-stack flex-wrap gap-4">
                                    <!--begin::Destination-->
                                    <div class="d-flex align-items-center fw-bold">
                                        <!--begin::Label-->
                                        <div class="text-muted fs-7 me-2">Cateogry</div>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select
                                            class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto select2-hidden-accessible"
                                            data-control="select2" data-hide-search="true"
                                            data-dropdown-css-class="w-150px" data-placeholder="Select an option"
                                            data-select2-id="select2-data-13-dxd8" tabindex="-1"
                                            aria-hidden="true" data-kt-initialized="1">
                                            <option></option>
                                            <option value="Show All" selected=""
                                                data-select2-id="select2-data-15-oxc1">Show All</option>
                                            <option value="a">Category A</option>
                                            <option value="b">Category B</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap5"
                                            dir="ltr" data-select2-id="select2-data-14-5phw"
                                            style="width: 100%;"><span class="selection"><span
                                                    class="select2-selection select2-selection--single form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                    role="combobox" aria-haspopup="true" aria-expanded="false"
                                                    tabindex="0" aria-disabled="false"
                                                    aria-labelledby="select2-00g0-container"
                                                    aria-controls="select2-00g0-container"><span
                                                        class="select2-selection__rendered"
                                                        id="select2-00g0-container" role="textbox"
                                                        aria-readonly="true" title="Show All">Show All</span><span
                                                        class="select2-selection__arrow" role="presentation"><b
                                                            role="presentation"></b></span></span></span><span
                                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Destination-->

                                    <!--begin::Status-->
                                    <div class="d-flex align-items-center fw-bold">
                                        <!--begin::Label-->
                                        <div class="text-muted fs-7 me-2">Status</div>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select
                                            class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto select2-hidden-accessible"
                                            data-control="select2" data-hide-search="true"
                                            data-dropdown-css-class="w-150px" data-placeholder="Select an option"
                                            data-kt-table-widget-5="filter_status"
                                            data-select2-id="select2-data-16-uevx" tabindex="-1"
                                            aria-hidden="true" data-kt-initialized="1">
                                            <option></option>
                                            <option value="Show All" selected=""
                                                data-select2-id="select2-data-18-0wii">Show All</option>
                                            <option value="In Stock">In Stock</option>
                                            <option value="Out of Stock">Out of Stock</option>
                                            <option value="Low Stock">Low Stock</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap5"
                                            dir="ltr" data-select2-id="select2-data-17-siru"
                                            style="width: 100%;"><span class="selection"><span
                                                    class="select2-selection select2-selection--single form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                    role="combobox" aria-haspopup="true" aria-expanded="false"
                                                    tabindex="0" aria-disabled="false"
                                                    aria-labelledby="select2-ryvb-container"
                                                    aria-controls="select2-ryvb-container"><span
                                                        class="select2-selection__rendered"
                                                        id="select2-ryvb-container" role="textbox"
                                                        aria-readonly="true" title="Show All">Show All</span><span
                                                        class="select2-selection__arrow" role="presentation"><b
                                                            role="presentation"></b></span></span></span><span
                                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Status-->

                                    <!--begin::Search-->
                                    <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/products.html"
                                        class="btn btn-light btn-sm">View Stock</a>
                                    <!--end::Search-->
                                </div>
                                <!--begin::Filters-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Table-->
                            <div id="kt_table_widget_5_table_wrapper"
                                class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-3 dataTable no-footer"
                                        id="kt_table_widget_5_table">
                                        <!--begin::Table head-->
                                        <thead>
                                            <!--begin::Table row-->
                                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="min-w-100px sorting" tabindex="0"
                                                    aria-controls="kt_table_widget_5_table" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Item: activate to sort column ascending"
                                                    style="width: 140.125px;">Item</th>
                                                <th class="text-end pe-3 min-w-100px sorting_disabled"
                                                    rowspan="1" colspan="1" aria-label="Product ID"
                                                    style="width: 106.688px;">Product ID</th>
                                                <th class="text-end pe-3 min-w-150px sorting" tabindex="0"
                                                    aria-controls="kt_table_widget_5_table" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Date Added: activate to sort column ascending"
                                                    style="width: 159.484px;">Date Added</th>
                                                <th class="text-end pe-3 min-w-100px sorting" tabindex="0"
                                                    aria-controls="kt_table_widget_5_table" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Price: activate to sort column ascending"
                                                    style="width: 106.688px;">Price</th>
                                                <th class="text-end pe-3 min-w-50px sorting" tabindex="0"
                                                    aria-controls="kt_table_widget_5_table" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Status: activate to sort column ascending"
                                                    style="width: 107.047px;">Status</th>
                                                <th class="text-end pe-0 min-w-25px sorting" tabindex="0"
                                                    aria-controls="kt_table_widget_5_table" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Qty: activate to sort column ascending"
                                                    style="width: 62.875px;">Qty</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->

                                        <!--begin::Table body-->
                                        <tbody class="fw-bold text-gray-600">







                                            <tr class="odd">
                                                <!--begin::Item-->
                                                <td>
                                                    <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-dark text-hover-primary">Macbook Air M1</a>
                                                </td>
                                                <!--end::Item-->

                                                <!--begin::Product ID-->
                                                <td class="text-end">
                                                    #XGY-356 </td>
                                                <!--end::Product ID-->

                                                <!--begin::Date added-->
                                                <td class="text-end" data-order="2023-04-20T00:00:00+04:00">
                                                    02 Apr, 2023 </td>
                                                <!--end::Date added-->

                                                <!--begin::Price-->
                                                <td class="text-end">
                                                    $1,230 </td>
                                                <!--end::Price-->

                                                <!--begin::Status-->
                                                <td class="text-end">
                                                    <span class="badge py-3 px-4 fs-7 badge-light-primary">In
                                                        Stock</span>
                                                </td>
                                                <!--end::Status-->

                                                <!--begin::Qty-->
                                                <td class="text-end" data-order="58">
                                                    <span class="text-dark fw-bold">58 PCS</span>
                                                </td>
                                                <!--end::Qty-->
                                            </tr>
                                            <tr class="even">
                                                <!--begin::Item-->
                                                <td>
                                                    <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-dark text-hover-primary">Surface Laptop 4</a>
                                                </td>
                                                <!--end::Item-->

                                                <!--begin::Product ID-->
                                                <td class="text-end">
                                                    #YHD-047 </td>
                                                <!--end::Product ID-->

                                                <!--begin::Date added-->
                                                <td class="text-end" data-order="2023-04-20T00:00:00+04:00">
                                                    01 Apr, 2023 </td>
                                                <!--end::Date added-->

                                                <!--begin::Price-->
                                                <td class="text-end">
                                                    $1,060 </td>
                                                <!--end::Price-->

                                                <!--begin::Status-->
                                                <td class="text-end">
                                                    <span class="badge py-3 px-4 fs-7 badge-light-danger">Out of
                                                        Stock</span>
                                                </td>
                                                <!--end::Status-->

                                                <!--begin::Qty-->
                                                <td class="text-end" data-order="0">
                                                    <span class="text-dark fw-bold">0 PCS</span>
                                                </td>
                                                <!--end::Qty-->
                                            </tr>
                                            <tr class="odd">
                                                <!--begin::Item-->
                                                <td>
                                                    <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-dark text-hover-primary">Logitech MX 250</a>
                                                </td>
                                                <!--end::Item-->

                                                <!--begin::Product ID-->
                                                <td class="text-end">
                                                    #SRR-678 </td>
                                                <!--end::Product ID-->

                                                <!--begin::Date added-->
                                                <td class="text-end" data-order="2023-03-20T00:00:00+04:00">
                                                    24 Mar, 2023 </td>
                                                <!--end::Date added-->

                                                <!--begin::Price-->
                                                <td class="text-end">
                                                    $64 </td>
                                                <!--end::Price-->

                                                <!--begin::Status-->
                                                <td class="text-end">
                                                    <span class="badge py-3 px-4 fs-7 badge-light-primary">In
                                                        Stock</span>
                                                </td>
                                                <!--end::Status-->

                                                <!--begin::Qty-->
                                                <td class="text-end" data-order="290">
                                                    <span class="text-dark fw-bold">290 PCS</span>
                                                </td>
                                                <!--end::Qty-->
                                            </tr>
                                            <tr class="even">
                                                <!--begin::Item-->
                                                <td>
                                                    <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-dark text-hover-primary">AudioEngine HD3</a>
                                                </td>
                                                <!--end::Item-->

                                                <!--begin::Product ID-->
                                                <td class="text-end">
                                                    #PXF-578 </td>
                                                <!--end::Product ID-->

                                                <!--begin::Date added-->
                                                <td class="text-end" data-order="2023-03-20T00:00:00+04:00">
                                                    24 Mar, 2023 </td>
                                                <!--end::Date added-->

                                                <!--begin::Price-->
                                                <td class="text-end">
                                                    $1,060 </td>
                                                <!--end::Price-->

                                                <!--begin::Status-->
                                                <td class="text-end">
                                                    <span class="badge py-3 px-4 fs-7 badge-light-danger">Out of
                                                        Stock</span>
                                                </td>
                                                <!--end::Status-->

                                                <!--begin::Qty-->
                                                <td class="text-end" data-order="46">
                                                    <span class="text-dark fw-bold">46 PCS</span>
                                                </td>
                                                <!--end::Qty-->
                                            </tr>
                                            <tr class="odd">
                                                <!--begin::Item-->
                                                <td>
                                                    <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-dark text-hover-primary">HP Hyper LTR</a>
                                                </td>
                                                <!--end::Item-->

                                                <!--begin::Product ID-->
                                                <td class="text-end">
                                                    #PXF-778 </td>
                                                <!--end::Product ID-->

                                                <!--begin::Date added-->
                                                <td class="text-end" data-order="2023-01-20T00:00:00+04:00">
                                                    16 Jan, 2023 </td>
                                                <!--end::Date added-->

                                                <!--begin::Price-->
                                                <td class="text-end">
                                                    $4500 </td>
                                                <!--end::Price-->

                                                <!--begin::Status-->
                                                <td class="text-end">
                                                    <span class="badge py-3 px-4 fs-7 badge-light-primary">In
                                                        Stock</span>
                                                </td>
                                                <!--end::Status-->

                                                <!--begin::Qty-->
                                                <td class="text-end" data-order="78">
                                                    <span class="text-dark fw-bold">78 PCS</span>
                                                </td>
                                                <!--end::Qty-->
                                            </tr>
                                            <tr class="even">
                                                <!--begin::Item-->
                                                <td>
                                                    <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-dark text-hover-primary">Dell 32 UltraSharp</a>
                                                </td>
                                                <!--end::Item-->

                                                <!--begin::Product ID-->
                                                <td class="text-end">
                                                    #XGY-356 </td>
                                                <!--end::Product ID-->

                                                <!--begin::Date added-->
                                                <td class="text-end" data-order="2023-12-20T00:00:00+04:00">
                                                    22 Dec, 2023 </td>
                                                <!--end::Date added-->

                                                <!--begin::Price-->
                                                <td class="text-end">
                                                    $1,060 </td>
                                                <!--end::Price-->

                                                <!--begin::Status-->
                                                <td class="text-end">
                                                    <span class="badge py-3 px-4 fs-7 badge-light-warning">Low
                                                        Stock</span>
                                                </td>
                                                <!--end::Status-->

                                                <!--begin::Qty-->
                                                <td class="text-end" data-order="8">
                                                    <span class="text-dark fw-bold">8 PCS</span>
                                                </td>
                                                <!--end::Qty-->
                                            </tr>
                                            <tr class="odd">
                                                <!--begin::Item-->
                                                <td>
                                                    <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-dark text-hover-primary">Google Pixel 6 Pro</a>
                                                </td>
                                                <!--end::Item-->

                                                <!--begin::Product ID-->
                                                <td class="text-end">
                                                    #XVR-425 </td>
                                                <!--end::Product ID-->

                                                <!--begin::Date added-->
                                                <td class="text-end" data-order="2023-12-20T00:00:00+04:00">
                                                    27 Dec, 2023 </td>
                                                <!--end::Date added-->

                                                <!--begin::Price-->
                                                <td class="text-end">
                                                    $1,060 </td>
                                                <!--end::Price-->

                                                <!--begin::Status-->
                                                <td class="text-end">
                                                    <span class="badge py-3 px-4 fs-7 badge-light-primary">In
                                                        Stock</span>
                                                </td>
                                                <!--end::Status-->

                                                <!--begin::Qty-->
                                                <td class="text-end" data-order="124">
                                                    <span class="text-dark fw-bold">124 PCS</span>
                                                </td>
                                                <!--end::Qty-->
                                            </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                </div>
                                <div class="row">
                                    <div
                                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                    </div>
                                    <div
                                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                    </div>
                                </div>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Table Widget 5-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Content container-->
    </div>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>
