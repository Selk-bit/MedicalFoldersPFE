import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import white from '../../../public/img/dosssswhite.png';
import patients from '../../../public/img/patients.png';



export default class DashboardRA extends Component {

    constructor(props)
    {
        super(props);

        this.state = {
          json:JSON.parse(props.data),//data received from a laravel controller used to implement the page.
          pdf: '',
          pdf1: '',
          id_p: '',
          raid: '',
          id_pm: '',
          raidm: '',
          raisp: '',
          fid: '',


        };
        this.GT = this.GT.bind(this);
        console.log('props = ');
        console.log(props);
        this.onChangeValue = this.onChangeValue.bind(this);
        this.onSubmitButton = this.onSubmitButton.bind(this);     
        this.onSubmitButton2 = this.onSubmitButton2.bind(this);     
        this.onSubmitButton3 = this.onSubmitButton3.bind(this);    
        this.click = this.click.bind(this);    


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

    click(){
      const F = $("#fid").val();
      const P = $("#raisp").val();
      this.setState({
        raisp: P,
        fid: F,
      })
    }
    

    onChangeValue(e) {
      // console.log(event.target.files[0]);
      const a = $("#ipat").val();
      const R = $("#rai").val();
      const b = $("#ipatm").val();
      const S = $("#raimd").val();





      this.setState({
          // [e.target.name]: e.target.value,
          [e.target.name]: event.target.files[0],
          id_p: a,
          raid: R,
          id_pm: b,
          raidm: S,
 

        });

        let x = document.getElementById("pdf").value;
        let y = document.getElementById("pdf1").value;

        
        x ? getFileExtension(x) === 'pdf' ? 1 : block() : 1 ;
        y ? getFileExtension(y) === 'pdf' ? 1 : block() : 1 ;
        
        function getFileExtension(filename) {
          return filename.split('.').pop();
        }
        
        function block()
        {
          Swal.fire({ icon: 'error', title: 'Only Pdfs are Allowed', text: 'Only Pdfs Are Allowed', footer: 'Try a Pdf File'});
          document.getElementById("pdf").value = null ;
          document.getElementById("pdf1").value = null ;
          
      }
  }
  

  
  async onSubmitButton(e) {
        e.preventDefault();
        const formData = new FormData();
        formData.append("pdf", this.state.pdf);
        formData.append("id_p", this.state.id_p);
        formData.append("raid", this.state.raid);
        // const my_this = this;
        const response = await axios.post("/uploadFile", formData, {
        headers: {
        "Content-Type": "multipart/form-data"
        }
        })
        // .then(function (response) {
        //   // console.log(response.data);
        //   console.log(response);
        //   // componentDidMount (response);
        //   my_this.setState({
        //     json:JSON.parse(response.data)
        //   });
        // })
        .then((response) => {
          console.log(response);
          document.getElementById("pdf").value = null ;
          document.getElementById("pdf1").value = null ;
          $('#exampleModal').modal('toggle');
          var myTable = $('#dataTable1').DataTable();
          myTable.clear().draw();
          var arr = response.data.datap;
          for (var i = 0; i < arr.length; i++) {
            console.log(arr[i].nom);
            myTable.row.add(
            [
              '<img style="display:block; margin-left:auto; margin-right:auto;" width="60" height="60" className="img-profile" src="/' + arr[i].src + '"/>',
               arr[i].cin,
               arr[i].nom,
               arr[i].prenom,
               arr[i].titre,
               '<a data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" href="/CDM/' + arr[i].PatientId + '" id="clc" ><input value=' + arr[i].PatientId + ' id="hell" hidden></input><input id="hell1" value=' + arr[i].RAid + ' hidden></input>Uploader un document <strong>PDF Only</strong></a>'
            ]
           ).draw();
          }


          var myTable = $('#dataTable2').DataTable();
          myTable.clear().draw();
          var arr1 = response.data.datapu;
          for (var i = 0; i < arr1.length; i++) {
            console.log(arr1[i].nom);
            myTable.row.add(
            [
              '<img style="display:block; margin-left:auto; margin-right:auto;"  width="60" height="60" className="img-profile" src="/' + arr1[i].src + '"/>',
               arr1[i].cin,
               arr1[i].nom,
               arr1[i].prenom,
               arr1[i].titre,
               '<a data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo" href="/CDM/' + arr1[i].PatientId + '" id="clc1" ><input value=' + arr1[i].PatientId + ' id="mdf" hidden></input><input id="mdf1" value=' + arr1[i].RAid + ' hidden></input><input id="mdf2" value=' + arr1[i].Fid + ' hidden></input>Modifier </a>-<a data-toggle="modal" data-target="#exampleModa2" data-whatever="@mdo" href="/CDM/' + arr1[i].PatientId + '" id="clc2" > Supprimer</a>'

            ]
           ).draw();
          }
          Swal.fire({ icon: 'success', title: 'File Added', text: 'You File has been added successfully',showConfirmButton: false,timer: 1500});


        })
        .catch(err => { 
            console.log(err);
            // my_this.setState({errorMessage: err.message});    
            this.setState({errorMessage: err.message});    
        })

    }



    async onSubmitButton2(e) {
      e.preventDefault();
      const formData = new FormData();
      formData.append("pdf1", this.state.pdf1);
      formData.append("id_pm", this.state.id_pm);
      formData.append("raidm", this.state.raidm);
      const response = await axios.post("/updateFile", formData, {
      headers: {
      "Content-Type": "multipart/form-data"
      }
      })
      .then((response) => {
        console.log(response);
        document.getElementById("pdf").value = null ;
        document.getElementById("pdf1").value = null ;
        $('#exampleModal1').modal('toggle');
        Swal.fire({ icon: 'success', title: 'File Modified', text: 'You File has been modofied successfully',showConfirmButton: false,timer: 1500});



      })
      .catch(err => { 
          console.log(err);
          this.setState({errorMessage: err.message});    
      })

  }


  async onSubmitButton3(e) {
    e.preventDefault();
    const formData = new FormData();
    formData.append("fid", this.state.fid);
    formData.append("raisp", this.state.raisp);
    // const my_this = this;
    const response = await axios.post("/deleteFile", formData, {
    headers: {
    "Content-Type": "multipart/form-data"
    }
    })

    .then((response) => {
      console.log(response);
      $('#exampleModa2').modal('toggle');
      var myTable = $('#dataTable1').DataTable();
      myTable.clear().draw();
      var arr = response.data.datap;
      for (var i = 0; i < arr.length; i++) {
        console.log(arr[i].nom);
        myTable.row.add(
        [
          '<img style="display:block; margin-left:auto; margin-right:auto;" width="60" height="60" className="img-profile" src="/' + arr[i].src + '"/>',
           arr[i].cin,
           arr[i].nom,
           arr[i].prenom,
           arr[i].titre,
           '<a data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" href="/CDM/' + arr[i].PatientId + '" id="clc" ><input value=' + arr[i].PatientId + ' id="hell" hidden></input><input id="hell1" value=' + arr[i].RAid + ' hidden></input>Uploader un document <strong>PDF Only</strong></a>'
        ]
       ).draw();
      }


      var myTable = $('#dataTable2').DataTable();
      myTable.clear().draw();
      var arr1 = response.data.datapu;
      for (var i = 0; i < arr1.length; i++) {
        console.log(arr1[i].nom);
        myTable.row.add(
        [
          '<img style="display:block; margin-left:auto; margin-right:auto;"  width="60" height="60" className="img-profile" src="/' + arr1[i].src + '"/>',
           arr1[i].cin,
           arr1[i].nom,
           arr1[i].prenom,
           arr1[i].titre,
           '<a data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo" href="/CDM/' + arr1[i].PatientId + '" id="clc1" ><input value=' + arr1[i].PatientId + ' id="mdf" hidden></input><input id="mdf1" value=' + arr1[i].RAid + ' hidden></input><input id="mdf2" value=' + arr1[i].Fid + ' hidden></input>Modifier </a>-<a data-toggle="modal" data-target="#exampleModa2" data-whatever="@mdo" href="/CDM/' + arr1[i].PatientId + '" id="clc2" > Supprimer</a>'

        ]
       ).draw();
      }
      Swal.fire({ icon: 'success', title: 'File Deleted', text: 'You File has been deleted successfully',showConfirmButton: false,timer: 1500});


    })
    .catch(err => { 
        console.log(err);
        // my_this.setState({errorMessage: err.message});    
        this.setState({errorMessage: err.message});    
    })

}


    // componentDidMount (URL) { 
    //   fetch(URL)
    //   // .then(res => res.json)
    //   .then((data) => {
    //       this.setState({ 
    //           json:JSON.parse(response.data)
    //         });
    //   })
    // }


    // onSubmitButton(e) {
    //   e.preventDefault();
    //   const formData = new FormData();
    //   formData.append("pdf", this.state.pdf);
    //   formData.append("id_p", this.state.id_p);

    //   axios.post("/CreateCDM", formData, {
    //     headers: {
    //       "Content-Type": "multipart/form-data"
    //     }
    //   })
    //   .then(response => {
    //      // obtain the data return from controller 
    //      const { pdf, id, specialite } = response.data;
    //     alert(specialite);
    //      //perform your redirection to other routes.
    //      window.location.href = `/X/${pdf}${id}${specialite}`;
    //   })
    //   .catch(err => { 
    //     console.log(err);
    //     this.setState({errorMessage: err.message});    
    //   })
    // }
  
    render()
    {
     return (
      <div>
        <div id="wrapper">
          {/* Sidebar */}
          <ul className="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
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
            Interface Laboratoire ( Radio / Analyse ) 
            </div>
            {/* Nav Item - Pages Collapse Menu */}
            <li className="nav-item">
              {/* <a className="nav-link collapsed" href="" > */}
              <a className="nav-link collapsed" data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">
                {/* <img src={patients} ></img> */}
                <span><i style={{ color : '#fff'}} className="fas fa-hospital-user"></i>Patients Bénéficiaires</span>
              </a>
            </li>

            {/* Divider */}
                <hr className="sidebar-divider" />
            {/* Heading */}

            <li className="nav-item">
              {/* <a className="nav-link collapsed" href="" > */}
              <a className="nav-link collapsed" data-toggle="collapse" href="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">
                {/* <img src={patients} ></img> */}
                <span><i style={{ color : '#fff'}} className="fas fa-hospital-user"></i>Modifier / Supprimer un Fichier Uploadé</span>
              </a>
            </li>

            {/* Divider */}
            <hr className="sidebar-divider" />
            {/* Heading */}

            {/* Nav Item - Pages Collapse Menu */}

            {/* Divider */}
            {/* Sidebar Toggler (Sidebar) */}
            <div className="text-center d-none d-md-inline">
              <button className="rounded-circle border-0" id="sidebarToggle" />
            </div>
          </ul>
          {/* End of Sidebar */}
          {/* Content Wrapper */}
          <div id="content-wrapper" className="d-flex flex-column">
            {/* Main Content */}
            <div id="content">
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
                           <h3 style={{fontFamily: 'courier,arial,helvetica', fontSize: '2vw' , color: 'black'}}>
                             Gestion d'Upload des Fichers
                           </h3> 
                        </div>
                   </div>
                </form>
                {/* Topbar Navbar */}
                <ul className="navbar-nav ml-auto">
                  {/* Nav Item - Search Dropdown (Visible Only XS) */}
                  
                  {/* Nav Item - Alerts */}
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
 
              <div className="container-fluid collapse multi-collapse hide" id="multiCollapseExample1">
        {/* Page Heading */}

        {/* DataTales Example */}
        <div className="card shadow mb-4" >
          <div className="card-header py-3">
            <h6 className="m-0 font-weight-bold text-primary">Patients en attente de résultats</h6>
          </div>
          <div className="card-body">
            <div className="table-responsive">
              <table className="table table-bordered display" id="dataTable1" width="100%" cellSpacing={0}>
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>CIN</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Besoin de</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Image</th>
                    <th>CIN</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Besoin de</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                {this.state.json[1].map(i => (
                  <tr>
                    <td><img style={{display: 'block', marginLeft: 'auto', marginRight: 'auto'}} width={60} height={60} className="img-profile rounded-circle" src={`/${i.src}`}/></td>
                    <td>{i.cin}</td>
                    <td>{i.nom}</td>
                    <td>{i.prenom}</td>
                    <td>{i.titre}</td>
                    {/* <input onClick={this.state.click} value={i.id} id="click" ></input> */}
                    <td><a data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" href={`/CDM/${i.PatientId}`} id="clc" ><input value={i.PatientId} id="hell" hidden></input><input id="hell1" value={i.RAid} hidden></input>Uploader un document <strong>PDF Only</strong></a></td>
                    {/* <td><a data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" href={`/CDM/${i.id}`} onClick={() => this.state.click(i.id)} ><input value={i.id} hidden></input>Ouvrir un Dossier Midicale</a> - <a href="#" >Voir l'Historique</a></td> */}
                  </tr>
                ))}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


      <div className="container-fluid collapse multi-collapse hide" id="multiCollapseExample2">
        {/* Page Heading */}

        {/* DataTales Example */}
        <div className="card shadow mb-4">
          <div className="card-header py-3">
            <h6 className="m-0 font-weight-bold text-primary">Patients avec résultats envoyés</h6>
          </div>
          <div className="card-body">
            <div className="table-responsive">
              <table className="display table table-bordered " id="dataTable2" width="100%" cellSpacing={0}>
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>CIN</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Besoin de</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Image</th>
                    <th>CIN</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Besoin de</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                {this.state.json[3].map(i => (
                  <tr>
                    <td><img style={{display: 'block', marginLeft: 'auto', marginRight: 'auto'}} width={60} height={60} className="img-profile rounded-circle" src={`/${i.src}`}/></td>
                    <td>{i.cin}</td>
                    <td>{i.nom}</td>
                    <td>{i.prenom}</td>
                    <td>{i.titre}</td>
                    {/* <input onClick={this.state.click} value={i.id} id="click" ></input> */}
                    <td><a data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo" href={`/CDM/${i.PatientId}`} id="clc1" ><input value={i.PatientId} id="mdf" hidden></input><input id="mdf1" value={i.RAid} hidden></input><input id="mdf2" value={i.Fid} hidden></input>Modifier </a>-<a data-toggle="modal" data-target="#exampleModa2" data-whatever="@mdo" href={`/CDM/${i.PatientId}`} id="clc2" > Supprimer</a></td>
                  </tr>
                ))}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
              {/* /.container-fluid */}
              {/* diagrame */}
<div className="container" id="pushDown">
        <div className="col-md-10" style={{margin: '0 auto 0 auto'}}>
          <div className="row">
            <div className="col-md-5 card" style={{margin: '0 auto 0 auto'}}>
              <canvas id="myChart" width={400} height={400} />
            </div> 
            <div className="text-md-right col-md-5 card" style={{margin: '0 auto 0 auto'}}>
              <canvas id="line-chart" width={1600} height={1400} />
            </div>
          </div>

              {/* <div className="col-md-8 card" style={{margin: '0 auto 0 auto'}}> */}
                  {/* <div className="col-md-12" style={{margin: '0 auto 0 auto'}}>
                      <canvas id="line-chart" width={1600} height={1400} />
                  </div> */}
              {/* </div> */}

          {/* </div> */}
        </div>
      </div>
{/* Enddiagrame */}

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
                <h5 className="modal-title" id="exampleModalLabel">Uploading File</h5>
                <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div className="modal-body">
                <form onSubmit={this.onSubmitButton}>
                {/* <form action="/CreateCDM" method="post"> */}
                  <div className="form-group">
                    <label htmlFor="pdf" className="col-form-label">pdf:</label>
                    {/* <input name="pdf" type="file" className="form-control" id="pdf" onChange={this.onChangeValue} required/> */}
                    <input accept="application/pdf" name="pdf" type="file" className="form-control"  id="pdf" onChange={this.onChangeValue} required/>
                    <input name="ipat" id="ipat" hidden></input>
                    <input name="rai" id="rai" hidden></input>
                  </div>
                <button className="btn" id="clicker" style={{background: '#827FFE' , color: 'white'}}><i className="fas fa-cloud-upload-alt"></i> Uploader</button>
                </form>
              </div>
              <div className="modal-footer">
                {/* <button type="button" className="btn btn-secondary" data-dismiss="modal">Close</button> */}
                {/* <button type="submit" className="btn btn-primary">Confirmer</button> */}
              </div>
            </div>
          </div>
        </div>


        <div className="modal fade" id="exampleModal1" tabIndex={-1} role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div className="modal-dialog">
            <div className="modal-content">
              <div className="modal-header">
                <h5 className="modal-title" id="exampleModalLabel">Uploading File</h5>
                <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div className="modal-body">
                <form onSubmit={this.onSubmitButton2}>
                {/* <form action="/CreateCDM" method="post"> */}
                  <div className="form-group">
                    <label htmlFor="pdf1" className="pdfMod" className="col-form-label">pdf à Modifier:</label>
                    {/* <input name="pdf" type="file" className="form-control" id="pdf" onChange={this.onChangeValue} required/> */}
                    <input accept="application/pdf" name="pdf1" type="file" className="form-control"  id="pdf1" onChange={this.onChangeValue} required/>
                    <input name="ipatm" id="ipatm" hidden></input>
                    <input name="raimd" id="raimd" hidden></input>
                  </div>
                <button className="btn" style={{background: '#827FFE' , color: 'white'}}><i className="fas fa-user-plus"></i> Submit</button>
                </form>
              </div>
              <div className="modal-footer">
                {/* <button type="button" className="btn btn-secondary" data-dismiss="modal">Close</button> */}
                {/* <button type="submit" className="btn btn-primary">Confirmer</button> */}
              </div>
            </div>
          </div>
        </div>


        <div className="modal fade" id="exampleModa2" tabIndex={-1} role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div className="modal-dialog">
            <div className="modal-content">
              <div className="modal-header">
                <h5 className="modal-title" id="exampleModalLabel">Uploading File</h5>
                <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div className="modal-body">
                <form onSubmit={this.onSubmitButton3}>
                {/* <form action="/CreateCDM" method="post"> */}
                  <div className="form-group">
                    <label htmlFor="pdf1" className="col-form-label">Are You Sure ?</label>
                    {/* <input name="pdf" type="file" className="form-control" id="pdf" onChange={this.onChangeValue} required/> */}
                    <input name="fid" id="fid"  hidden></input>
                    <input name="raisp" id="raisp"  hidden></input>
                  </div>
                <button onClick={this.click} className="btn" style={{background: '#827FFE' , color: 'white'}}>Yes</button>
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

if (document.getElementById('dashRA')) {
    var data = document.getElementById(('dashRA')).getAttribute('data');
    ReactDOM.render(<DashboardRA data={data} />, document.getElementById('dashRA'));
}



