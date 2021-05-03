import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class DashboardRA extends Component {

  constructor(props)
  {
      super(props);
      this.state = {
        json:JSON.parse(props.data),//data received from a laravel controller used to implement the page.
        pdf: '',
        id_p: '',
        raid: '',
        click: (id , R) => {
          const a = id;
          this.setState({
            id_p: a,
            raid: R
          });
        // click: function(id){
        //   var a = id;
        //   alert(a);
        //   document.getElementById("hiddenTarget").value = a;
        //   this.setState({
        //   id: a,
        //   })

      }
      };
      this.GT = this.GT.bind(this);
      console.log('props = ');
      console.log(props);
      this.onChangeValue = this.onChangeValue.bind(this);
      this.onSubmitButton = this.onSubmitButton.bind(this);     

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
    // console.log(event.target.files[0]);
    this.setState({
        // [e.target.name]: e.target.value,
        [e.target.name]: event.target.files[0],
      });

      let x = document.getElementById("pdf").value;
      
      x ? getFileExtension(x) === 'pdf' ? 1 : block() : 1 ;
      
      function getFileExtension(filename) {
        return filename.split('.').pop();
      }
      
      function block()
      {
        Swal.fire({ icon: 'error', title: 'Only Pdfs are Allowed', text: 'Only Pdfs Are Allowed', footer: 'Try a Pdf File'});
        document.getElementById("pdf").value = null ;
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
        window.location.reload(false);
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
              <img src="https://lh3.googleusercontent.com/dWMmK0U-6jxQcEV24ZvboJgf5J9E8zxCf_tULWv9bX3gmBjuq1-7Yo8sy1iV56gyruVub0NNDY67Ng45FIT17hDcF1UK6_rMcNJRQDx-xTY7PDcufztuTxQRTfzO730zqvj-5Kve-5JHNBmZx0X8jYXz6YKyQPolKIytYvHC3eYLWmXndLne-1AAzfp60RsdbQzeSyBFPAE4lzfD3CB_HRip3MxEBKUxri0yw0A1_0VoQsjZfHp4GOzjvmwCiNXDDyO6ty8y60jDd072arPaFwj_kqu-YOHrSIVxVCr1CnV4CTCWMSiY89bgIcdDmIB07qdOZC4kgbvmX_VdcPaAvmMRxBnrWA3cAqJQSF6mbGjbAhDKnUea7KokyDbFlZCsJQYRXuAAmE8C5bwBygsnBY-V_PqJ7aKC9t12voOByY9qkmanpFF8A-JRHUlTblq_4syQsyOLkXKvlZ59GI7wfCXEKAWPDaOW3WAL5aJW7KXmVfdojqTAkAptqUCqDqKI8q09IIu5ooeDesz7MANDqVU268k5j4TDzrDZQVRCWiPq9AJmjLMJu32WrwGw9oxNUtKHoP0MhX98_Vlc_iDytlcsULJNAh6tHFbOGnTjncEnaRp0afA7yE2jIreaGdIhbkeq-I0VkvNZ9P8Srf6crqXQLSfuY_uUXjlDFiki9CpaGz-bfE6Azu71xML7=w45-h37-no?authuser=0"></img>
              </div>
              <div className="sidebar-brand-text mx-3">FEML</div>
            </a>
            {/* Divider */}
            <hr className="sidebar-divider my-0" />
            {/* Nav Item - Dashboard */}

            {/* Divider */}
            <hr className="sidebar-divider" />
            {/* Heading */}
            <div className="sidebar-heading">
            Interface Medcine Radio / Analyse
            </div>
            {/* Nav Item - Pages Collapse Menu */}
            <li className="nav-item">
              {/* <a className="nav-link collapsed" href="" > */}
              <a className="nav-link collapsed" data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">
                <img src="https://lh3.googleusercontent.com/Y1d1FbYcvl46OLN7jkR9Sl302A7v3CxXdlUS_cYzm7A6rz6q1-UOTPR6Ul-xqMUXxu3kG3a1r4jSHsUeeyxTRsR-tSL9fA6K1LdTpPQ7-PG-fstbQB2Qdlivq3iDVMV9NhfCsIYeP7ggME8FHiPDHFMitFgVmvymBeKyzocM9L0XmD1lgMoqc9skIYyxyiL0MHBbesBI-6_A0yVREO7Q1Ze91CvMw5GnykmKnOhpDrhbj6OzxaRW1gBIR0W-OS-Ck0aFYs1CJu16_eFv9SzR82FWFyMO57dJWC2MPpz6I2eqSOK8DwFGDH7EvYo41VTxQd7TDMXKqvDJHEYWQ_NmrnYeGRw00YmKNTTKqT24t4ZmwrCqyuOZN0uTpzP8nIMneupDacH3xQLN3AmAgplambbUhz0oGdek6a8ujpvddCvk2A_5qjfISENvhECoaRScnCQOcgWLslakbsLnJmP0wBxJjCgKnhlz9YQ07FX7GJTCUXXOffm0BxShQ0VOnMO-5MTgR7Tj-T8toFXtGNcGMotsTbeQ5Rurmk2ZQtJOjp6ghxVs0IM4hYPDXVHXC6twjGqdf7HmprvCIqlfzhQ6Zn98ttHgRWRbVZLo3JScsKKWs0shl_YDjUH0zLxquhL6yY4aDF70LTrwg10mpdm3QvbV0lAcmfJcW-j7lNXNCafM5jKxmE0ce7ES2w3z=w20-h14-no?authuser=0" ></img>
                <span>Patients</span>
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
              
              <div className="container-fluid collapse multi-collapse show" id="multiCollapseExample1">
        {/* Page Heading */}

        {/* DataTales Example */}
        <div className="card shadow mb-4" >
          <div className="card-header py-3">
            <h6 className="m-0 font-weight-bold text-primary">Patients</h6>
          </div>
          <div className="card-body">
            <div className="table-responsive">
              <table className="table table-bordered display" id="dataTable" width="100%" cellSpacing={0}>
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
                    <td><img style={{display: 'block', marginLeft: 'auto', marginRight: 'auto'}} width={60} height={60} className="img-profile" src={`/${i.src}`}/></td>
                    <td>{i.cin}</td>
                    <td>{i.nom}</td>
                    <td>{i.prenom}</td>
                    <td>{i.titre}</td>
                    {/* <input onClick={this.state.click} value={i.id} id="click" ></input> */}
                    <td><a data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" href={`/CDM/${i.PatientId}`} onClick={() => this.state.click(i.PatientId , i.RAid)} ><input value={i.PatientId} id="click" hidden></input><input value={i.RAid} hidden></input>Uploader un document <strong>PDF Only</strong></a></td>
                    {/* <td><a data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" href={`/CDM/${i.id}`} onClick={() => this.state.click(i.id)} ><input value={i.id} hidden></input>Ouvrir un Dossier Midicale</a> - <a href="#" >Voir l'Historique</a></td> */}
                  </tr>
                ))}
                </tbody>
              </table>
            </div>
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
                  </div>
                <button className="btn"  style={{background: '#827FFE' , color: 'white'}}><i className="fas fa-user-plus"></i> Submit</button>
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