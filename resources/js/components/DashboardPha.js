import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import white from '../../../public/img/dosssswhite.png';






export default class DashboardPha extends Component {

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
        this.onChangeValue = this.onChangeValue.bind(this);
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
            Interface Pharmacien
            </div>
            {/* Nav Item - Pages Collapse Menu */}
            <li className="nav-item">
              {/* <a className="nav-link collapsed" href="" > */}
              <a className="nav-link" data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="true" aria-controls="multiCollapseExample1">
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
                             Gestion des Médicaments
                           </h3> 
                        </div>
                   </div>
                </form>

                
                
                {/* Topbar Navbar */}
                <ul className="navbar-nav ml-auto">
                  {/* Nav Item - Search Dropdown (Visible Only XS) */}
                  
           
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
              <div style={{margin: '0 2rem'}} className="container-fluid" className=" multi-collapse collapsed collapse show in" id="multiCollapseExample1"> 
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
                    <td><div className="row"><div style={{margin: '0 auto'}}><button style={{margin: '0.2rem auto'}} className="x btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onClick={() => this.state.click(i.id)} ><input value={i.id} id="click" hidden></input>Scanner des Medicaments</button></div></div></td>
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
                <h5 className="modal-title" id="exampleModalLabel">Scanner</h5>
                <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div className="modal-body">

              <div id="scanner-container" />

                  <div className="form-group">

                    <input name="id_p" type="text" className="form-control" id="hiddenTarget" hidden/>
                  </div>
                {/* <input type="button" id="btn"  defaultValue="Start/Stop the scanner" /> */}
                <button className="btn" id="btn" style={{background: '#827FFE' , color: 'white'}}><i className="fas fa-barcode"></i> Start Scanner</button>
              </div>
              <div className="modal-footer">

              </div>
            </div>
          </div>
        </div>

      </div>
        );
    }
}

if (document.getElementById('dashPha')) {
    var data = document.getElementById(('dashPha')).getAttribute('data');
    ReactDOM.render(<DashboardPha data={data} />, document.getElementById('dashPha'));
}
