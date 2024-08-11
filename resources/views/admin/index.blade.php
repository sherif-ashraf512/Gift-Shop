@extends('layouts.main')
@section('title')
home
@endsection
@section('content')
<body style="background-color: black">
    @include('layouts.admin.navbar')
    @extends('layouts.admin.sidebar')
    @section('home')
    active
    @endsection

    <div class="content">
        <div class="row mb-2 p-2">
            <div class="col bg-dark p-2 mb-1 me-2">
            <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title text-secondary">
                    <div class="icon"><i class="fa-solid fa-user-tie"></i></div><strong>Total Clients</strong>
                </div>
                <div class="number dashtext-1">{{$users}}</div>
                </div>
                <div class="progress progress-template">
                <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                </div>
            </div>
            </div>
            <div class="col bg-dark p-2 mb-1 me-2">
            <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title text-secondary">
                    <div class="icon"><i class="fa-solid fa-diagram-project"></i></div><strong>Total Products</strong>
                </div>
                <div class="number dashtext-2">{{$products}}</div>
                </div>
                <div class="progress progress-template">
                <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                </div>
            </div>
            </div>
            <div class="col bg-dark p-2 mb-1 me-2">
            <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title text-secondary">
                    <div class="icon"><i class="fa-solid fa-file-invoice"></i></div><strong>Total Orders</strong>
                </div>
                <div class="number dashtext-3">{{$orders}}</div>
                </div>
                <div class="progress progress-template">
                <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                </div>
            </div>
            </div>
            <div class="col bg-dark p-2 mb-1 me-2">
            <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title text-secondary">
                    <div class="icon"><i class="fa-solid fa-layer-group"></i></div><strong>Total Delivered</strong>
                </div>
                <div class="number dashtext-4">{{$delivered}}</div>
                </div>
                <div class="progress progress-template">
                <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                </div>
            </div>
            </div>
        </div>
        <div class="row p-2 text-secondary">
            <div class="col-lg-4 me-4 mb-1 bg-dark">
              <div class="bar-chart mb-2 block">
                <canvas id="barChartExample1"></canvas>
              </div>
              <div class="bar-chart mb-2 block">
                <canvas id="barChartExample2"></canvas>
              </div>
            </div>
            <div class="col-lg-7 flex-grow-1 px-5 bg-dark">
              <div class="line-cahrt block">
                <canvas id="lineCahrt"></canvas>
              </div>
            </div>
        </div>
        <div class="row p-2 mb-2 text-secondary">
            <div class="row px-4 mb-1 col-lg-6">
                <div class="row col-lg-12 p-2 mb-3 bg-dark">
                    <div class="col-lg-6">
                        <div class="statistic-block border-end border-black text-center p-4 block">
                            <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title text-secondary">
                                <h2 class="fw-bolder low fs-1">5.657</h2>
                                <p class="fs-3 fw-bold">Standerd Scans</p>
                            </div>
                            </div>
                            <div class="progress progress-template">
                            <div role="progressbar" style="width: 50%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="statistic-block text-center p-4 block">
                            <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title text-secondary">
                                <h2 class="fw-bolder high fs-1">3.1459</h2>
                                <p class="fs-2 fw-bold">Team Scans</p>
                            </div>
                            </div>
                            <div class="progress progress-template">
                            <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="row col-lg-12 bg-dark p-2">
                    <div class="col-lg-6">
                        <div class="statistic-block border-end border-black text-center p-4 block">
                            <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title text-secondary">
                                <p class="fw-bold mb-0 fs-2">745</p>
                                <p class="fs-3 fw-bold">Standerd Scans</p>
                            </div>
                            </div>
                            <div class="progress progress-template">
                            <div role="progressbar" style="width: 20%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="border-bottom border-black mb-2 text-center">
                            <p class="fw-bold mb-0 fs-4">4.124</p>
                            <p class="fs-4 fw-bold">THREATS</p>
                            <small class="fw-bold d-block mb-4">+246</small>
                        </div>
                        <div class="text-center">
                            <p class="fw-bold mb-0 fs-4">2.147</p>
                            <p class="fs-4 fw-bold">NEUTRAL</p>
                            <small class="fw-bold d-block mb-1">+416</small>
                        </div>
                    </div>
                  </div>
            </div>
            <div class="col-lg-5 flex-grow-1 p-4 bg-dark">
              <div class="line-cahrt">
                <canvas id="lineCahrt1"></canvas>
              </div>
            </div>
        </div>
        <div class="row mb-2 p-2">
            <div class="col me-2 mb-1 bg-dark">
                <div class="info p-2 text-secondary text-center">
                    <img src="{{ asset('storage/images/avatar-1.jpg') }}" alt="...">
                    <span class="rank d-inline-block rounded-circle p-1 text-light fw-bold dashbg-2">1st</span>
                    <a class="text-decoration-none text-secondary d-block fs-3 fw-bold" href="">Richard Nevoreski</a>
                    <a class="text-decoration-none text-secondary d-block fs-4 mt-0" href="">@richardnevo</a>
                    <p class="btn mt-3 px-5 fw-bold rounded-pill disabled">950 Contributions</p>
                </div>
                <div class="d-flex text-secondary p-2 justify-content-around">
                    <div>
                        <span class="fa fa-light fa-circle-info me-2"></span>
                        <span class="fw-bold">150</span>
                    </div>
                    <div>
                        <span class="fa-brands fa-gg me-2"></span>
                        <span class="fw-bold">150</span>
                    </div>
                    <div>
                        <span class="fa-solid fa-diagram-project me-2"></span>
                        <span class="fw-bold">150</span>
                    </div>
                </div>
            </div>
            <div class="col me-2 mb-1 bg-dark">
                <div class="info p-2 text-secondary text-center">
                    <img src="{{ asset('storage/images/avatar-2.jpg') }}" alt="...">
                    <span class="rank d-inline-block rounded-circle p-1 text-light fw-bold dashbg-3">2st</span>
                    <a class="text-decoration-none text-secondary d-block fs-3 fw-bold" href="">Samuel Watson</a>
                    <a class="text-decoration-none text-secondary d-block fs-4 mt-0" href="">@samwatson</a>
                    <p class="btn mt-3 px-5 fw-bold rounded-pill disabled">772 Contributions</p>
                </div>
                <div class="d-flex text-secondary p-2 justify-content-around">
                    <div>
                        <span class="fa fa-light fa-circle-info me-2"></span>
                        <span class="fw-bold">80</span>
                    </div>
                    <div>
                        <span class="fa-brands fa-gg me-2"></span>
                        <span class="fw-bold">420</span>
                    </div>
                    <div>
                        <span class="fa-solid fa-diagram-project me-2"></span>
                        <span class="fw-bold">272</span>
                    </div>
                </div>
            </div>
            <div class="col me-2 mb-1 bg-dark">
                <div class="info p-2 text-secondary text-center">
                    <img src="{{ asset('storage/images/avatar-4.jpg') }}" alt="...">
                    <span class="rank d-inline-block rounded-circle p-1 text-light fw-bold dashbg-4">3rd</span>
                    <a class="text-decoration-none text-secondary d-block fs-3 fw-bold" href="">Sebastian Wood</a>
                    <a class="text-decoration-none text-secondary d-block fs-4 mt-0" href="">@sebastian</a>
                    <p class="btn mt-3 px-5 fw-bold rounded-pill disabled">620 Contributions</p>
                </div>
                <div class="d-flex text-secondary p-2 justify-content-around">
                    <div>
                        <span class="fa fa-light fa-circle-info me-2"></span>
                        <span class="fw-bold">150</span>
                    </div>
                    <div>
                        <span class="fa-brands fa-gg me-2"></span>
                        <span class="fw-bold">280</span>
                    </div>
                    <div>
                        <span class="fa-solid fa-diagram-project me-2"></span>
                        <span class="fw-bold">190</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ms-2">
            <div class="col-lg-12 row mb-2 p-3 text-center align-items-center bg-dark d-flex justify-content-around">
                <div class="info col p-2 d-flex justify-content-between align-items-center text-secondary">
                    <span class="rank-other me-3 d-inline-block fw-bold p-1 fs-5">4th</span>
                    <img class="me-3" src="{{ asset('storage/images/avatar-7.jpg') }}" alt="...">
                    <div>
                        <a class="text-decoration-none d-block text-secondary fs-4 fw-bold" href="">Tomas Hecktor</a>
                        <a class="text-decoration-none user d-block text-secondary fs-5 mt-0" href="">@tomhecktor</a>
                    </div>
                </div>
                <div class="col text-secondary">
                    <p class="btn mt-3 px-5 fw-bold rounded-pill disabled">410 Contributions</p>
                </div>
                <div class="col d-flex text-secondary p-2 justify-content-around">
                    <div class="me-4">
                        <span class="fa fa-light fa-circle-info me-2"></span>
                        <span class="fw-bold">110</span>
                    </div>
                    <div class="me-4">
                        <span class="fa-brands fa-gg me-2"></span>
                        <span class="fw-bold">200</span>
                    </div>
                    <div class="me-4">
                        <span class="fa-solid fa-diagram-project me-2"></span>
                        <span class="fw-bold">100</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 row mb-2 p-3 text-center align-items-center bg-dark d-flex justify-content-around">
                <div class="col info p-2 d-flex justify-content-between align-items-center text-secondary">
                    <span class="rank-other me-3 d-inline-block fw-bold p-1 fs-5">5th</span>
                    <img class="me-3" src="{{ asset('storage/images/avatar-10.jpg') }}" alt="...">
                    <div>
                        <a class="text-decoration-none d-block text-secondary fs-4 fw-bold" href="">Alexander Shelby</a>
                        <a class="text-decoration-none user d-block text-secondary fs-5 mt-0" href="">@alexshelby</a>
                    </div>
                </div>
                <div class="col text-secondary">
                    <p class="btn mt-3 px-5 fw-bold rounded-pill disabled">320 Contributions</p>
                </div>
                <div class="col d-flex text-secondary p-2 justify-content-around">
                    <div class="me-4">
                        <span class="fa fa-light fa-circle-info me-2"></span>
                        <span class="fw-bold">150</span>
                    </div>
                    <div class="me-4">
                        <span class="fa-brands fa-gg me-2"></span>
                        <span class="fw-bold">120</span>
                    </div>
                    <div class="me-4">
                        <span class="fa-solid fa-diagram-project me-2"></span>
                        <span class="fw-bold">50</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 row mb-2 p-3 text-center align-items-center bg-dark d-flex justify-content-around">
                <div class="col info p-2 d-flex justify-content-between align-items-center text-secondary">
                    <span class="rank-other me-3 d-inline-block fw-bold p-1 fs-5">6th</span>
                    <img class="me-3" src="{{ asset('storage/images/avatar-6.jpg') }}" alt="...">
                    <div>
                        <a class="text-decoration-none d-block text-secondary fs-4 fw-bold" href="">Arther Kooper</a>
                        <a class="text-decoration-none user d-block text-secondary fs-5 mt-0" href="">@artherkooper</a>
                    </div>
                </div>
                <div class="col text-secondary">
                    <p class="btn mt-3 px-5 fw-bold rounded-pill disabled">170 Contributions</p>
                </div>
                <div class="col d-flex text-secondary p-2 justify-content-around">
                    <div class="me-4">
                        <span class="fa fa-light fa-circle-info"></span>
                        <span class="fw-bold">60</span>
                    </div>
                    <div class="me-4">
                        <span class="fa-brands fa-gg "></span>
                        <span class="fw-bold">70</span>
                    </div>
                    <div class="me-4">
                        <span class="fa-solid fa-diagram-project"></span>
                        <span class="fw-bold">40</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-2 mb-2">
            <div class="col text-secondary mb-1 p-2 me-2 bg-dark">
                <p class="fw-bold fs-3 m-0">Sales Difference</p>
                <p>Lorem ipsum dolor sit</p>
                <div class="row">
                    <div class="col-6">
                        <p class="fs-2 m-0 dashtext-2">$740</p>
                        <p class="m-0">May 2017</p>
                        <small class="d-block">320 Sales</small>
                    </div>
                    <div class="col-6">
                        <div class="line-cahrt">
                            <canvas id="sales"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col text-secondary mb-1 p-2 me-2 bg-dark">
                <p class="fw-bold fs-3 m-0">Visit Statistics</p>
                <p>Lorem ipsum dolor sit</p>
                <div class="row">
                    <div class="col-6">
                        <p class="fs-2 m-0 dashtext-3">$457</p>
                        <p class="m-0">May 2017</p>
                        <small class="d-block">210 Sales</small>
                    </div>
                    <div class="col-6">
                        <div class="line-cahrt">
                            <canvas id="visit"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col text-secondary mb-1 p-2 me-2 bg-dark">
                <p class="fw-bold fs-3 m-0">Sales Activities</p>
                <p>Lorem ipsum dolor sit</p>
                <div class="row">
                    <div class="col-6">
                        <p class="fs-2 m-0 dashtext-1">80%</p>
                        <p class="m-0">May 2017</p>
                        <small class="d-block">+35 Sales</small>
                    </div>
                    <div class="col-6">
                        <div class="line-cahrt">
                            <canvas id="sales1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-2 mb-2">
            <div class="col p-2 text-secondary me-2 bg-dark">
                <h2>To Do List</h2>
                <div class="form-check py-4 m-3">
                    <input class="form-check-input" type="checkbox" value="" id="1">
                    <label class="form-check-label" for="1">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </label>
                </div>
                <div class="form-check py-4 m-3">
                    <input class="form-check-input" checked type="checkbox" value="" id="2">
                    <label class="form-check-label" for="2">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </label>
                </div>
                <div class="form-check py-4 m-3">
                    <input class="form-check-input" type="checkbox" value="" id="3">
                    <label class="form-check-label" for="3">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </label>
                </div>
                <div class="form-check py-4 m-3">
                    <input class="form-check-input" type="checkbox" value="" id="4">
                    <label class="form-check-label" for="4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </label>
                </div>
                <div class="form-check py-4 m-3">
                    <input class="form-check-input" type="checkbox" value="" id="5">
                    <label class="form-check-label" for="5">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </label>
                </div>
                <div class="form-check py-4 m-3">
                    <input class="form-check-input" type="checkbox" value="" id="6">
                    <label class="form-check-label" for="6">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </label>
                </div>
            </div>
            <div class="col p-2 text-secondary me-2 bg-dark">
                <h2>New Messages</h2>
                <a href="" class="m-3 d-block text-secondary message text-decoration-none py-1">
                    <div class="d-flex align-items-center p-1">
                        <img class="rounded-circle" src="{{asset('storage/images/avatar-5.jpg')}}" alt="">
                        <span class="dot d-inline-block rounded-circle bg-success"></span>
                        <div>
                            <p class="self-start fs-4 m-0 fw-bold">Nadia Halsey</p>
                            <p class="fs-6 m-0 fw-bold">Lorem ipsum dolor sit amet</p>
                            <small class="d-block m-0">9:30pm</small>
                        </div>
                    </div>
                </a>
                <a href="" class="m-3 d-block text-secondary message text-decoration-none py-1">
                    <div class="d-flex align-items-center p-1">
                        <img class="rounded-circle" src="{{asset('storage/images/avatar-3.jpg')}}" alt="">
                        <span class="dot d-inline-block rounded-circle bg-warning"></span>
                        <div>
                            <p class="self-start fs-4 m-0 fw-bold">Sara Wood</p>
                            <p class="fs-6 m-0 fw-bold">Lorem ipsum dolor sit amet</p>
                            <small class="d-block m-0">7:35pm</small>
                        </div>
                    </div>
                </a>
                <a href="" class="m-3 d-block text-secondary message text-decoration-none py-1">
                    <div class="d-flex align-items-center p-1">
                        <img class="rounded-circle" src="{{asset('storage/images/avatar-4.jpg')}}" alt="">
                        <span class="dot d-inline-block rounded-circle bg-danger"></span>
                        <div>
                            <p class="self-start fs-4 m-0 fw-bold">Sebastian Wood</p>
                            <p class="fs-6 m-0 fw-bold">Lorem ipsum dolor sit amet</p>
                            <small class="d-block m-0">6:48pm</small>
                        </div>
                    </div>
                </a>
                <a href="" class="m-3 d-block text-secondary message text-decoration-none py-1">
                    <div class="d-flex align-items-center p-1">
                        <img class="rounded-circle" src="{{asset('storage/images/avatar-8.jpg')}}" alt="">
                        <span class="dot d-inline-block rounded-circle bg-success"></span>
                        <div>
                            <p class="self-start fs-4 m-0 fw-bold">Nada Martin</p>
                            <p class="fs-6 m-0 fw-bold">Lorem ipsum dolor sit amet</p>
                            <small class="d-block m-0">8:20am</small>
                        </div>
                    </div>
                </a>
                <a href="" class="m-3 d-block text-secondary message text-decoration-none py-1">
                    <div class="d-flex align-items-center p-1">
                        <img class="rounded-circle" src="{{asset('storage/images/avatar-9.jpg')}}" alt="">
                        <span class="dot d-inline-block rounded-circle bg-secondary"></span>
                        <div>
                            <p class="self-start fs-4 m-0 fw-bold">Olivia Smith</p>
                            <p class="fs-6 m-0 fw-bold">Lorem ipsum dolor sit amet</p>
                            <small class="d-block m-0">5:02pm</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row p-2 mb-2">
            <div class="col bg-dark p-2 mb-1 me-2 text-secondary">
                <div>
                    <p class="fs-3 m-0 fw-bold">Credit Sales</p>
                    <p class="fs-6">Lorem ipsum dolor sit</p>
                    <div class="text-center justify-content-center d-flex">
                        <div class="line-cahrt">
                            <canvas width="150" height="150" id="credit"></canvas>
                        </div>
                        <div class="text">
                            <p class="fs-4 fw-bold m-0">$2.145</p>
                            <small class="fs-5 d-block">Sales</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col bg-dark p-2 mb-1 me-2 text-secondary">
                <div>
                    <p class="fs-3 m-0 fw-bold">Channel Sales</p>
                    <p class="fs-6">Lorem ipsum dolor sit</p>
                    <div class="text-center justify-content-center d-flex">
                        <div class="line-cahrt">
                            <canvas width="150" height="150" id="channel"></canvas>
                        </div>
                        <div class="text">
                            <p class="fs-4 fw-bold m-0">$7.784</p>
                            <small class="fs-5 d-block">Sales</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col bg-dark p-2 mb-1 text-secondary">
                <div class="sales-chart">
                    <p class="fs-3 m-0 fw-bold">Direct Sales</p>
                    <p class="fs-6">Lorem ipsum dolor sit</p>
                    <div class="text-center justify-content-center d-flex">
                        <div class="line-cahrt">
                            <canvas width="150" height="150" id="direct"></canvas>
                        </div>
                        <div class="text">
                            <p class="fs-4 fw-bold m-0">$4.957</p>
                            <small class="fs-5 d-block">Sales</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.admin.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

@endsection
