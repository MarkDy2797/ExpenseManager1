@extends('layouts.app')

@section('content')
<!--<div id="app" class="container">-->

  <div id="app">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="">Expense Manager</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
          <a  href="{{ route('logout') }}" class="btn btn-primary btn-sm" style="margin-right:10px;" onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">MENU</div>
                        <a class="nav-link" href="javascript:void(0)" v-on:click="seen1 = false,seen2 = false,seen3 = false,seen4 = false,seen5 = true"> <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div> Dashboard </a>
                        <a class="nav-link" href="javascript:void(0)">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>  User Management  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse show" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="javascript:void(0)" v-on:click="seen1 = true,seen2 = false,seen3 = false,seen4 = false,seen5 = false"><i class="fas fa-caret-right"></i> &nbsp;Roles</a>
                                <a class="nav-link" href="javascript:void(0)" v-on:click="seen1 = false,seen2 = true,seen3 = false,seen4 = false,seen5 = false"><i class="fas fa-caret-right"></i> &nbsp;Users</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="javascript:void(0)">
                            <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>  Expense Management  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse show" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                          <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link" href="javascript:void(0)" v-on:click="seen1 = false,seen2 = false,seen3 = true,seen4 = false,seen5 = false"><i class="fas fa-caret-right"></i> &nbsp;Expense Categories</a>
                              <a class="nav-link" href="javascript:void(0)" v-on:click="seen1 = false,seen2 = false,seen3 = false,seen4 = true,seen5 = false"><i class="fas fa-caret-right"></i> &nbsp;Expenses</a>
                          </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as: <strong style="color:white;">{{ Auth::user()->name }}</strong></div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main v-if="seen1">
                <div class="container-fluid">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">ROLES</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header" style="text-align:right;">
                           <!--<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addrole">+ Add Role</button>-->
                           <button type="button" class="btn btn-success btn-sm" v-on:click="maddrole">+ Add Role</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Display Name</th>
                                            <th>Description</th>
                                            <th>Created at</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="item in Items" class="hov" id="show-modal" v-on:click="showModal=true; setVal(item.displayname, item.description)">
                                            <td>@{{item.displayname}}</td>
                                            <td>@{{item.description}}</td>
                                            <td>@{{item.datecreated}}</td>
                                            <td><button class="btn btn-danger btn-sm" v-on:click="deleteItem(item)">Delete</button> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="modal fade" id="addrole" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Add Role</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                              <input type="text" class="form-control" id="displayname" placeholder="Display Name" v-model="roleItem.displayname" required>
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" id="description" placeholder="Description" v-model="roleItem.description" required>
                            </div>
                            
                              <p class="text-center  alert alert-danger" v-if="hasError">Please fill all the fields</p>
                          
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <button type="button" class="btn btn-primary" @click.prevent="createrole()">Save</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--<modal v-if="showModal" v-on:click="showModal=false">
                    <h3 slot="header">Edit Item</h3>
                    <div slot="body">test</div>
                    <div slot="footer">
                      <button class="btn btn-default" v-on:click="showModal=false">Cancel</button>
                      <button class="btn btn-info" v-on:click="editItem()">Update</button>
                    </div>
                  </modal>-->
            </main>
            <main v-if="seen2">
              <div class="container-fluid">
                  <ol class="breadcrumb mb-4">
                      <li class="breadcrumb-item active">USERS</li>
                  </ol>
                  <div class="card mb-4">
                      <div class="card-header" style="text-align:right;">
                         <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#adduser">+ Add User</button>
                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Email Address</th>
                                          <th>Role</th>
                                          <th>Created at</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr class="hov" v-for="itemuser in ItemsUser">
                                          <td>@{{itemuser.name}}</td>
                                          <td>@{{itemuser.emailaddress}}</td>
                                          <td>@{{itemuser.urole}}</td>
                                          <td>@{{itemuser.datecreated}}</td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
                <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="Name" v-model="userItem.name" required>
                          </div>
                          <div class="form-group">
                            <input type="email" class="form-control" id="emailaddress" placeholder="Email Address" v-model="userItem.emailaddress" required>
                          </div>
                          <div class="form-group">
                            <select name="urole" id="urole" class="form-control" v-model="userItem.urole" required>
                              <option value="Administrator" selected>Administrator</option>
                              <option value="User">User</option>
                            </select>
                          </div>
                          
                            <p class="text-center  alert alert-danger" v-if="hasErrorUser">Please fill all the fields</p>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" @click.prevent="createuser()">Save</button>
                      </div>
                    </div>
                  </div>
                </div>
          </main>
          <main v-if="seen3">
            <div class="container-fluid">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">EXPENSE CATEGORIES</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header" style="text-align:right;">
                       <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addec">+ Add Category</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Display Name</th>
                                        <th>Description</th>
                                        <th>Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <tr class="hov" v-for="itemec in ItemsEc">
                                     <td>@{{itemec.displaynameec}}</td>
                                     <td>@{{itemec.descriptionec}}</td>
                                     <td>@{{itemec.datecreated}}</td>
                                   </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
              <div class="modal fade" id="addec" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                          <input type="text" class="form-control" id="displaynameec" placeholder="Display Name" v-model="ecItem.displaynameec" required>
                        </div>
                        <div class="form-group">
                          <input type="email" class="form-control" id="descriptionec" placeholder="Description" v-model="ecItem.descriptionec" required>
                        </div>
                        
                          <p class="text-center  alert alert-danger" v-if="hasErrorEc">Please fill all the fields</p>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary" @click.prevent="createec()">Save</button>
                    </div>
                  </div>
                </div>
              </div>
        </main>
        <main v-if="seen4">
          <div class="container-fluid">
              <ol class="breadcrumb mb-4">
                  <li class="breadcrumb-item active">EXPENSES</li>
              </ol>
              <div class="card mb-4">
                  <div class="card-header" style="text-align:right;">
                     <button type="button" class="btn btn-success btn-sm" disabled>+ Add Expense</button>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                      <th>Expense Category</th>
                                      <th>Amount</th>
                                      <th>Entry Date</th>
                                      <th>Created at</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr class="hov">
                                      <td>N/A</td>
                                      <td>N/A</td>
                                      <td>N/A</td>
                                      <td>N/A</td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </main>
      <main v-if="seen5">
        <div class="container-fluid">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><strong>ADMIN</strong> &nbsp;DASHBOARD</li>
            </ol>

            <div class="row">
              <div class="col-xl-12">
                  <div class="card mb-4">
                      <div class="card-header">
                          <i class="fas fa-chart-area mr-1"></i>
                          Chart Here
                      </div>
                      <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                  </div>
              </div>
          </div>


          
            
        </div>
    </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Simple laravel & VueJs WebApp &copy;2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
  </div>


    <!--my added
    <div class="container-fluid"  style="margin:0px !important; padding:0px !important;">
        <div class="row">
          <nav class="col-md-3 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky" style="background-color:rgba(0,0,0,.02);">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" href="javascript:void(0)" v-on:click="seen1 = false,seen2 = false,seen3 = false,seen4 = false,seen5 = true">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="javascript:void(0)" style="color:grey;">
                    <span data-feather="file"></span>
                    • User Mgt.
                  </a>
                </li>
                <li class="nav-item" >
                  <a class="nav-link" href="javascript:void(0)" v-on:click="seen1 = true,seen2 = false,seen3 = false,seen4 = false,seen5 = false">
                    <span data-feather="shopping-cart"></span>
                    &nbsp;&nbsp;&nbsp;Roles
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="javascript:void(0)" v-on:click="seen1 = false,seen2 = true,seen3 = false,seen4 = false,seen5 = false">
                    <span data-feather="users"></span>
                    &nbsp;&nbsp;&nbsp;Users
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="javascript:void(0)" style="color:grey;">
                    <span data-feather="bar-chart-2"></span>
                    • Expense Mgt.
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="javascript:void(0)" v-on:click="seen1 = false,seen2 = false,seen3 = true,seen4 = false,seen5 = false">
                    <span data-feather="layers"></span>
                    &nbsp;&nbsp;&nbsp;Expense Categories
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" v-on:click="seen1 = false,seen2 = false,seen3 = false,seen4 = true,seen5 = false">
                      <span data-feather="layers"></span>
                      &nbsp;&nbsp;&nbsp;Expenses
                    </a>
                  </li>
              </ul>
  
              
              
            </div>
          </nav>
  
          <main  v-if="seen1" role="main" class="col-md-9 ml-sm-auto col-lg-9 pt-3 px-4" style="background-color:rgba(0,0,0,.04);">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
              <h5 class="h5">ROLES</h5> 
              <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addrole">Add Role</button>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>Header</th>
                    <th>Header</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="item in Items" class="hov">
                    <td>@{{item.displayname}}</td>
                    <td>@{{item.description}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
                <div class="modal fade" id="addrole" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="form-group">
                            <input type="text" class="form-control" id="displayname" placeholder="Display Name" v-model="roleItem.displayname" required>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="description" placeholder="Description" v-model="roleItem.description" required>
                          </div>
                          
                            <p class="text-center  alert alert-danger" v-if="hasError">Please fill all the fields</p>
                         
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" @click.prevent="createrole()">Save</button>
                      </div>
                    </div>
                  </div>
                </div>
          </main>
          <main v-if="seen2" role="main" class="col-md-9 ml-sm-auto col-lg-9 pt-3 px-4" style="background-color:rgba(0,0,0,.04);">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
              <h1 class="h2">USERS</h1> 
              <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button type="button" class="btn btn-primary btn-sm">Add Role</button>
                </div>
              </div>
            </div>
            
            <h2>Section title</h2>
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1,001</td>
                    <td>Lorem</td>
                    <td>ipsum</td>
                    <td>dolor</td>
                    <td>sit</td>
                  </tr>
                  <tr>
                    <td>1,002</td>
                    <td>amet</td>
                    <td>consectetur</td>
                    <td>adipiscing</td>
                    <td>elit</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </main>
          <main v-if="seen3" role="main" class="col-md-9 ml-sm-auto col-lg-9 pt-3 px-4" style="background-color:rgba(0,0,0,.04);">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
              <h1 class="h2">EXPENSE CATEGORIES</h1> 
              <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button type="button" class="btn btn-primary btn-sm">Add Role</button>
                </div>
              </div>
            </div>
  
            
            <h2>Section title</h2>
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1,001</td>
                    <td>Lorem</td>
                    <td>ipsum</td>
                    <td>dolor</td>
                    <td>sit</td>
                  </tr>
                  <tr>
                    <td>1,002</td>
                    <td>amet</td>
                    <td>consectetur</td>
                    <td>adipiscing</td>
                    <td>elit</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </main>
          <main v-if="seen4" role="main" class="col-md-9 ml-sm-auto col-lg-9 pt-3 px-4" style="background-color:rgba(0,0,0,.04);">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
              <h1 class="h2">EXPENSES</h1> 
              <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button type="button" class="btn btn-primary btn-sm">Add Role</button>
                </div>
              </div>
            </div>
            
            <h2>Section title</h2>
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1,001</td>
                    <td>Lorem</td>
                    <td>ipsum</td>
                    <td>dolor</td>
                    <td>sit</td>
                  </tr>
                  <tr>
                    <td>1,002</td>
                    <td>amet</td>
                    <td>consectetur</td>
                    <td>adipiscing</td>
                    <td>elit</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </main>
          <main v-if="seen5" role="main" class="col-md-9 ml-sm-auto col-lg-9 pt-3 px-4" style="background-color:rgba(0,0,0,.04);">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
              <h4 class="h4">DASHBOARD</h4> 
              <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button type="button" class="btn btn-primary btn-sm">Add Role</button>
                </div>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1,001</td>
                    <td>Lorem</td>
                    <td>ipsum</td>
                    <td>dolor</td>
                    <td>sit</td>
                  </tr>
                  <tr>
                    <td>1,002</td>
                    <td>amet</td>
                    <td>consectetur</td>
                    <td>adipiscing</td>
                    <td>elit</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </main>
        </div>
      </div>-->

     
     <!--<script src="//{//{mix('/js/app.js')}}"></script>-->
        
    <!--end
    <div class="row justify-content-center">
        <div class="col-md-12"  style="background-color:green;">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>-->
<!--</div>-->
@endsection

<script type="text/javascript" src="/js/app.js"></script>
<!--<script type="text/x-template" id="modal-template">
<transition name="modal">
<div class="modal-mask">
  <div class="modal-wrapper">
    <div class="modal-container">
      <div class="modal-header">
        <slot name="header">
          default header
        </slot>
      </div>
      <div class="modal-body">
        <slot name="body">
          
        </slot>
      </div>
      <div class="modal-footer">
        <slot name="footer">
       
        </slot>
      </div>
    </div>
  </div>
</div>

</transition>  
</script>-->