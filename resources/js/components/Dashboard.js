import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import white from '../../../public/img/dosssswhite.png';
import doss from '../../../public/img/doss.png';
import dossier2 from '../../../public/img/dossier2.png';
import patient from '../../../public/img/patient.png';
import patients from '../../../public/img/patients.png';
import redirect from '../../../public/img/redirect.png';





export default class Dashboard extends Component {

    constructor(props)
    {
        super(props);
        this.state = {
          json:JSON.parse(props.data),//data received from a laravel controller used to implement the page.
          objet: '',
          id_p: '',
          // click: (id) => {
          //   const a = id;
          //   this.setState({
          //     id_p: a,
          //   });
          click: function(id){
            var a = id;
            // alert(a);
            document.getElementById("hiddenTarget").value = a;
            this.setState({
              id: a,
            })
          },
          // LG: function()
          //   {
          //     console.log('hi');
          //   }
        };
        this.GT = this.GT.bind(this);
        // this.onChangeValue = this.onChangeValue.bind(this);
        // this.onSubmitButton = this.onSubmitButton.bind(this);     
    }
    GT() {
      // const response = await axios.post("/CreateCDM", formData, {
      const response = axios.post("/logout")
              .then(function (response) {
                // console.log(response);
                // alert(response);
                  window.location = "/";
              })
              .catch(err => { 
                  console.log(err);
                  // this.setState({errorMessage: err.message});    
              })
    }


    onChangeValue(e) {
      this.setState({
          [e.target.name]: e.target.value,
        });
  }
  
  // async onSubmitButton(e) {
  //       e.preventDefault();
  //       console.log(this.state);
  //       const formData = new FormData();
  //       formData.append("objet", this.state.objet);
  //       formData.append("id_p", this.state.id_p);
  //       console.log("id_p = " + this.state.id_p);
  //       const response = await axios.post("/CreateCDM", formData, {
  //       headers: {
  //       "Content-Type": "multipart/form-data"
  //       }
  //       })
  //       .then(function (response) {
  //         console.log(response);
  //           // window.location = response.data.redirect;
  //       })
  //       .catch(err => { 
  //           console.log(err);
  //           this.setState({errorMessage: err.message});    
  //       })
  //   }



    // onSubmitButton(e) {
    //   e.preventDefault();
    //   const formData = new FormData();
    //   formData.append("objet", this.state.objet);
    //   formData.append("id_p", this.state.id_p);

    //   axios.post("/CreateCDM", formData, {
    //     headers: {
    //       "Content-Type": "multipart/form-data"
    //     }
    //   })
    //   .then(response => {
    //      // obtain the data return from controller 
    //      const { objet, id, specialite } = response.data;
    //     alert(specialite);
    //      //perform your redirection to other routes.
    //      window.location.href = `/X/${objet}${id}${specialite}`;
    //   })
    //   .catch(err => { 
    //     console.log(err);
    //     this.setState({errorMessage: err.message});    
    //   })
    // }
  
    componentDidMount () {
    }

    render()
    {
     return (
      <div>
        <div id="wrapper">
          {/* Sidebar */}
          <ul className="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"  >
            {/* Sidebar - Brand */}
            <a className="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
              <div className="sidebar-brand-icon rotate-n-15">
              <img src={white}></img>
              </div>
              <div className="sidebar-brand-text mx-3">PMM</div>
            </a>
            {/* Divider */}
            <hr className="sidebar-divider my-0" />
            {/* Nav Item - Dashboard */}

            {/* Divider */}
            <hr className="sidebar-divider" />
            {/* Heading */}
            <div className="sidebar-heading">
            Interface Medcine Specialise
            </div>
            {/* Nav Item - Pages Collapse Menu */}
            <li className="nav-item">
              {/* <a className="nav-link collapsed" href="" > */}
              <a className="nav-link collapsed" data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">
                {/* <img src={patients} className="abc"  ></img> */}
                <span style={{fontSize : '1.1vw'}}><i style={{ color : '#fff'}} className="fas fa-hospital-user"></i>Patients </span>
              </a>
            </li>

            {/* Divider */}
            <hr className="sidebar-divider" />
            {/* Heading */}
            
          {/* add pat */}
          <li className="nav-item">
              {/* <a className="nav-link collapsed" href="" > */}
              <a className="nav-link " href="/CreateNewPatient" >                
                <span style={{fontSize : '1.1vw' , color : '#fff'}}><i style={{ color : '#fff'}} className="fas fa-user-plus"></i> Ajouter Un Patient</span>
              </a>
            </li>

            {/* Divider */}
            <hr className="sidebar-divider" />
            {/* Heading */}
          {/* add patEnd */}

            {/* Sidebar Toggler (Sidebar) */}
            <div className="text-center d-none d-md-inline">
              <button className="rounded-circle border-0" id="sidebarToggle" />
            </div>
          </ul>
          {/* End of Sidebar */}
          {/* Content Wrapper */}
          <div id="content-wrapper" className="d-flex flex-column">
            {/* Main Content */}
            <div id="content" style={{background: '#EDF0F5'}}>
              {/* Topbar */}
              <nav className="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                {/* Sidebar Toggle (Topbar) */}
                <button id="sidebarToggleTop" className="btn btn-link d-md-none rounded-circle mr-3">
                  <i className="fa fa-bars" />
                </button>
                {/* Topbar Search */}
                <form className="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 ">
                  <div className="input-group">
                        <div className="input-group-append">
                           <h3 style={{fontFamily: 'courier,arial,helvetica', fontSize: '2vw'}}>
                             Gestion des Dossiers Médicaux
                           </h3> 
                        </div>
                   </div>
                </form>

                
                
                {/* Topbar Navbar */}
                <ul className="navbar-nav ml-auto">
                  {/* Nav Item - Search Dropdown (Visible Only XS) */}
                  
                  {/* Nav Item - Alerts */}
                  <li className="nav-item dropdown no-arrow mx-1">
           <a className="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i className="fas fa-bell fa-fw" />
          {/* Counter - Alerts */}
          <span className="badge badge-danger badge-counter">{this.state.json[7]}+</span>
        </a>
        {/* Dropdown - Alerts */}
        <div className="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
          <h6 className="dropdown-header">
            Alerts Center
          </h6>
          {this.state.json[8].map(i => (
          <a className="dropdown-item d-flex align-items-center" href="#">
            <div className="mr-3">
              <div className="icon-circle bg-warning">
                <i className="fas fa-exclamation-triangle text-white" />
              </div>
            </div>
            <div>
              <div className="small text-gray-500">{i.created_at}</div>
              The Results of the RadioAnalyse number {i.radioAnalyse_id} in the folder number {i.dossier_medical} are uploaded.
            </div>
          </a>
         ))}
          <a className="dropdown-item text-center small text-gray-500" href="#">Close Alerts</a>
        </div>
      </li>
                  {/* Nav Item - Messages */}

                  <div className="topbar-divider d-none d-sm-block" />
                  {/* Nav Item - User Information */}
                  <li className="nav-item dropdown no-arrow">
                    <a className="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {this.state.json[0].map(i => (<span className="mr-2 d-none d-lg-inline text-gray-600 small">{i.nom} {i.prenom}</span>))}
                      <img className="img-profile rounded-circle" src={this.state.json[2]} />
                    </a>
                    {/* Dropdown - User Information */}
                    <div className="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                      <a className="dropdown-item" href="/profile">
                        <i className="fas fa-user fa-sm fa-fw mr-2 text-gray-400" />
                        Profile
                      </a>
                      <div className="dropdown-divider" />
                      {/* <a className="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal" onClick={() => this.state.LG}> */}
                      {/* <a className="dropdown-item"  onClick={() => this.state.LG}> */}
                      <a className="dropdown-item" onClick={this.GT} style={{cursor: 'pointer'}}>
                        <i className="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" />
                        Logout
                      </a>
                    </div>
                  </li>
                </ul>
              </nav>
              {/* End of Topbar */}
              {/* Begin Page Content */}
              <div className="container-fluid">
              <div style={{margin: '0 2rem'}} className="container-fluid" className=" multi-collapse collapsed collapse" id="multiCollapseExample1"> 
        {/* Page Heading */}
        
        {/* DataTales Example */}
        <div className="card shadow mb-4" >
          <div className="card-header py-3">
            <h6 className="m-0 font-weight-bold text-primary">Patients</h6>
          </div>
          <div className="card-body">
            <div className="table-responsive">
              <table className="table table-bordered" id="dataTable" width="100%" cellSpacing={0}>
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>CIN</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Image</th>
                    <th>CIN</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                {this.state.json[1].map(i => (
                  <tr>
                    <td><img style={{display: 'block', marginLeft: 'auto', marginRight: 'auto'}} width={90} height={90} className="img-profile rounded-circle" src={`/${i.src}`}/></td>
                    <td>{i.cin}</td>
                    <td>{i.nom}</td>
                    <td>{i.prenom}</td>
                    {/* <input onClick={this.state.click} value={i.id} id="click" ></input> */}
                    <td><div className="row"><div style={{margin: '0 auto'}}><button style={{margin: '0.2rem auto'}} className="x btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onClick={() => this.state.click(i.id)} ><input value={i.id} id="click" hidden></input>Ouvrir un Dossier Midicale</button><form action="/HM" method="post" id="spp"><input value={i.id} name="click" hidden></input><button type="submit" className="btn btn-primary">Consulter l'Historique</button></form></div></div></td>
                    {/* <td><a data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" href={`/CDM/${i.id}`} onClick={() => this.state.click(i.id)} ><input value={i.id} id="click" hidden></input>Ouvrir un Dossier Midicale</a> - <form action="/HM" method="post" id="spp"><input value={i.id} name="click" hidden></input><button type="submit" className="btn btn-primary">Voir l'Historique</button></form></td> */}
                    {/* <td><a data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" href={`/CDM/${i.id}`} onClick={() => this.state.click(i.id)} ><input value={i.id} hidden></input>Ouvrir un Dossier Midicale</a> - <a href="#" >Voir l'Historique</a></td> */}
                  </tr>
                ))}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
                {/* Content Row */}
                <div className="row">
                  {/* Earnings (Monthly) Card Example */}
                  <div className="col-xl-3 col-md-6 mb-4">
                    <div className="card border-left-primary shadow h-100 py-2">
                      <div className="card-body">
                        <div className="row no-gutters align-items-center">
                          <div className="col mr-2">
                            <div className="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombre de Vos Patients</div>
                            <div className="h5 mb-0 font-weight-bold text-gray-800">{this.state.json[4]}</div>
                          </div>
                          <div className="col-auto">
                          <img src={patient}></img>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  {/* Earnings (Monthly) Card Example */}
                  <div className="col-xl-3 col-md-6 mb-4">
                    <div className="card border-left-success shadow h-100 py-2">
                      <div className="card-body">
                        <div className="row no-gutters align-items-center">
                          <div className="col mr-2">
                            <div className="text-xs font-weight-bold text-success text-uppercase mb-1">Votre Dossiers Médicaux</div>
                            <div className="h5 mb-0 font-weight-bold text-gray-800">{this.state.json[3]}</div>
                          </div>
                          <div className="col-auto">
                            <img src={dossier2}></img>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  {/* Earnings (Monthly) Card Example */}
                  <div className="col-xl-3 col-md-6 mb-4">
                    <div className="card border-left-info shadow h-100 py-2">
                      <div className="card-body">
                        <div className="row no-gutters align-items-center">
                          <div className="col mr-2">
                            <div className="text-xs font-weight-bold text-info text-uppercase mb-1">Dossiers Médicaux Actifs</div>
                                <div className="h5 mb-0 mr-3 font-weight-bold text-gray-800">{this.state.json[5]}</div>
                          </div>
                          <div className="col-auto">
                          <img src={doss}></img>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  {/* Pending Requests Card Example */}
                  <div className="col-xl-3 col-md-6 mb-4">
                    <div className="card border-left-warning shadow h-100 py-2">
                      <div className="card-body">
                        <div className="row no-gutters align-items-center">
                          <div className="col mr-2">
                            <div className="text-xs font-weight-bold text-warning text-uppercase mb-1">DOSSIERS Redirigés</div>
                            <div className="h5 mb-0 font-weight-bold text-gray-800">{this.state.json[6]}</div>
                          </div>
                          <div className="col-auto">
                          <img src={redirect}></img>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                {/* Content Row */}

                <div className="container">
        <div className="col-md-10" style={{margin: '0 auto 0 auto'}}>
          <div className="row">
            <div className="col-md-5 card" style={{margin: '0 auto 0 auto'}}>
              <canvas id="myChart" width={400} height={400} />
            </div> 
            <div className="text-md-right col-md-5 card" style={{margin: '0 auto 0 auto'}}>
              <canvas id="doughnut-chart" width={600} height={500} />
            </div> 
          </div>
            <br></br>
          {/* <div className="row"> */}
              <div className="col-md-8 card" style={{margin: '0 auto 0 auto'}}>
                  <canvas id="bar-chart-horizontal" width={800} height={300} />
              </div>
            <br></br>
              <div className="col-md-8 card" style={{margin: '0 auto 0 auto'}}>
                  <canvas id="bar-chart-horizontal2" width={800} height={300} />
              </div>
            <br></br>
              <div className="col-md-8 card" style={{margin: '0 auto 0 auto'}}>
                  <div className="col-md-12" style={{margin: '0 auto 0 auto'}}>
                      <canvas id="line-chart" width={1600} height={1400} />
                  </div>
              </div>
            <br></br>
          {/* </div> */}
        </div>
      </div>
                {/* Content Row */}
                <div className="row">
                  {/* Content Column */}
                  <div className="col-lg-6 mb-4">


                  </div>
                  <div className="col-lg-6 mb-4">
                    {/* Illustrations */}


                  </div>
                </div>
              </div>
              
              {/* /.container-fluid */}
            </div>
            {/* End of Main Content */}
            {/* Footer */}

            {/* End of Footer */}
          </div>
          {/* End of Content Wrapper */}
        </div>
        {/* End of Page Wrapper */}
        {/* Scroll to Top Button*/}
        <a className="scroll-to-top rounded" href="#page-top">
          <i className="fas fa-angle-up" />
        </a>
        {/* Logout Modal*/}

        {/* <button type="button" className="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> */}
        <div className="modal fade" id="exampleModal" tabIndex={-1} role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div className="modal-dialog">
            <div className="modal-content">
              <div className="modal-header">
                <h5 className="modal-title" id="exampleModalLabel">Nouveau Dossier Medicale</h5>
                <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div className="modal-body">
                {/* <form onSubmit={this.onSubmitButton}> */}
                <form action="/CreateCDM" method="post">
                  <div className="form-group">
                    <label htmlFor="objet" className="col-form-label">Objet:</label>
                    <input name="objet" type="text" className="form-control" id="objet" onChange={this.onChangeValue} required/>
                    <input name="id_p" type="text" className="form-control" id="hiddenTarget" onChange={this.onChangeValue} hidden/>
                  </div>
                <button className="btn" style={{background: '#827FFE' , color: 'white'}}><i className="fas fa-folder-plus"></i> Confirmer</button>
                </form>
              </div>
              <div className="modal-footer">
                {/* <button type="button" className="btn btn-secondary" data-dismiss="modal">Close</button> */}
                {/* <button type="submit" className="btn btn-primary">Confirmer</button> */}
              </div>
            </div>
          </div>
        </div>

      </div>
        );
    }
}

if (document.getElementById('dash')) {
    var data = document.getElementById(('dash')).getAttribute('data');
    ReactDOM.render(<Dashboard data={data} />, document.getElementById('dash'));
}
