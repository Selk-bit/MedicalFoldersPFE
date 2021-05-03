import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

import SimpleReactValidator from 'simple-react-validator';
import moment from 'moment';

var today = new Date().toISOString().split('T')[0];

export default class MedcineRegister extends Component
{
    constructor(props)
    {
        super(props);
        this.validator = new SimpleReactValidator();
        this.state = {
            json:JSON.parse(props.data),//data received from a laravel controller used to implement the select/option menu down below.
            inp: '',
            email: '',
            password: '',
            password_confirmation: '',
            nom: '',
            prenom: '',
            dateNaissance: '',
            tel: '',
            adress: '',
            Specialite: '1',//initialization
            errorMessage: '',
        };
        this.click = this.click.bind(this);
        this.onChangeValue = this.onChangeValue.bind(this);
        this.onSubmitButton = this.onSubmitButton.bind(this);
    }

    click(e)
    {
        switch (e.target.value) {
        case '1':
            document.getElementById("laboRadio").checked = false;
            document.getElementById("speRadio").checked =false;
            document.getElementById("phar").checked =false;
            // document.getElementsByClassName("speClass")[0].style.visibility = "hidden";
            // document.getElementsByClassName("speClass")[1].style.visibility = "hidden";
            document.getElementsByClassName("speClass")[2].style.visibility = "hidden";
            this.setState({
                Specialite: '1',
            });
            break;
        case '2':
            document.getElementById("radioRadio").checked = false;
            document.getElementById("speRadio").checked =false;
            document.getElementById("phar").checked =false;
            document.getElementsByClassName("speClass")[2].style.visibility = "hidden";
            this.setState({
                Specialite: '2',
            });
            break;
        case '3':
            document.getElementById("radioRadio").checked = false;
            document.getElementById("laboRadio").checked =false;
            document.getElementById("phar").checked =false;
            document.getElementsByClassName("speClass")[2].style.visibility = "visible";
            this.setState({
                Specialite: '3',
            });
            break;
        case '46' :
            document.getElementById("radioRadio").checked = false;
            document.getElementById("laboRadio").checked =false;
            document.getElementById("speRadio").checked =false;
            document.getElementsByClassName("speClass")[2].style.visibility = "hidden";
            this.setState({
                Specialite: '46',
            });
            break;
        default:
            alert('something Went wrong in ReactJS');   
        }
    }

    onChangeValue(e) {
        this.setState({
            [e.target.name]: e.target.value,
        });
    }

    async onSubmitButton(e) {
        e.preventDefault();
        if (this.validator.allValid()) {
            const formData = new FormData();
            formData.append("inp", this.state.inp);
            formData.append("email", this.state.email);
            formData.append("password", this.state.password);
            formData.append("nom", this.state.nom);
            formData.append("prenom", this.state.prenom);
            formData.append("dateNaissance", this.state.dateNaissance);
            formData.append("tel", this.state.tel);
            formData.append("adress", this.state.adress);
            formData.append("Specialite", this.state.Specialite);
            const response = await axios.post("/medcine/registerR", formData, {
            headers: {
            "Content-Type": "multipart/form-data"
            }
            }).then(function (response) {
                window.location = response.data.redirect;
            })
            .catch(err => { 
                console.log(err);
                this.setState({errorMessage: err.message});    
            })
            
            }
            else {
                this.validator.showMessages();
                this.forceUpdate();
            }
        }

        componentDidMount () {
        }
        
        render()
        {
            return (
                <div>                              
                    <form encType="multipart/form-data" onSubmit={this.onSubmitButton}>
                    <h6 className="card-title font-italic" style={{color: '#827FFE'}}><i className="fas fa-user-lock"></i>  Information Personelle :</h6>

                    <div className="row">
                        <div className="col">
                            <div className="form-group row">
                                    <label htmlFor="nom"  className="col-ms-4 col-form-label text-md-right ">Nom&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <div className="">
                                        <input  style={{background: '#F8F9FA'}} id="nom" type="text" className="form-control" name="nom" value={this.state.value4} onChange={this.onChangeValue}/>
                                        <p style={{color: 'red'}}>{this.validator.message('nom', this.state.nom, 'required|min:4|max:255')}</p>
                                    </div>
                                </div>
                        </div>
                        {/* col-md-6 */}
                                <div className="col">                                           
                                    <div className="form-group row">
                                        <label htmlFor="prenom" className="col-ms-4 col-form-label text-md-right">Prenom&nbsp;&nbsp;</label>
                                        <div className="">
                                            <input id="prenom" type="text" style={{background: '#F8F9FA'}} className="form-control" name="prenom" value={this.state.value5} onChange={this.onChangeValue}  />
                                            <p style={{color: 'red'}}>{this.validator.message('prenom', this.state.prenom, 'required|min:4|max:255')}</p>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div className="form-group row">
                            <label htmlFor="dateNaissance" className="col-md-4 col-form-label text-md-right">Date Naissance</label>
                            <div className="col-md-6">
                                <input id="dateNaissance" style={{background: '#F8F9FA'}} type="date" className="form-control" name="dateNaissance" value={this.state.value6} onChange={this.onChangeValue} max={today}/>
                                <p style={{color: 'red'}}>{this.validator.message('dateNaissance', this.state.dateNaissance, 'required|Date')}</p>
                            </div>
                        </div>
                    
                        <div className="form-group row">
                            <label htmlFor="tel" className="col-md-4 col-form-label text-md-right">Tel</label>
                            <div className="col-md-6">
                                {/* <input id="tel" name="tel" type="number" value={this.state.value7} onChange={this.onChangeValue} /> */}
                                <input id="tel" name="tel" style={{background: '#F8F9FA'}} className="form-control" type="text" value={this.state.value7} onChange={this.onChangeValue} />
                                <p style={{color: 'red'}}>{this.validator.message('tel', this.state.tel, 'required|numeric')}</p>
                            </div>
                        </div>
                    
                        <div className="form-group row">
                            <label htmlFor="adress" className="col-md-4 col-form-label text-md-right">Adresse</label>
                            <div className="col-md-6">
                                <textarea id="adress" style={{background: '#F8F9FA'}} className="form-control" type="text"name="adress" value={this.state.value8} onChange={this.onChangeValue}  />
                             </div>
                        </div>

                        <h6 className="card-title font-italic" style={{color: '#827FFE'}}><i className="fas fa-user-tie"></i> Information Professionelle :</h6>
                        <div className="form-group row">
                            <label className="col-md-4 col-form-label text-md-right">INP</label>
                            <div className="col-md-6">
                                <input id="inp" style={{background: '#F8F9FA'}} type="text" name="inp" className="form-control" value={this.state.value1} onChange={this.onChangeValue} />
                                <p style={{color: 'red'}}>{this.validator.message('inp', this.state.inp, 'required|between:6,20')}</p>
                            </div>
                        </div>
                                        
                        <div className="form-group row">
                            <label htmlFor="Specialite" className="col-md-4 col-form-label text-md-right">Specialite</label>
                                <div className="col-md-6">      
                                    <input onClick={this.click} className="radioClass" id="radioRadio" type="radio" defaultValue="1"/>
                                    <label className="radioClass">&nbsp;Radiologie</label>
                                    <br></br>
                                    <input onClick={this.click} className="laboClass" id="laboRadio" type="radio" defaultValue="2"/>
                                    <label className="laboClass" >&nbsp;Laboratoire d'Analyse</label>
                                    <br></br>
                                    <input onClick={this.click} className="pharClass" id="phar" type="radio" defaultValue="46"/>
                                    <label className="pharClass" >&nbsp;Pharmacien</label>
                                    <br></br>
                                    <input onClick={this.click} type="radio" className="speClass" id="speRadio" defaultValue="3"/>
                                    <label className="speClass">&nbsp;Medcine Specialise</label>                              
                                    <select onChange={this.onChangeValue} style={{background: '#F8F9FA'}} className="form-control speClass" name="Specialite" value={this.state.value} >     
                                        {this.state.json.map(i => (
                                            i.id > 2 && i.id < 46 ? <option value={i.id}>{i.nom}</option> : <span></span>
                                        ))}
                                    </select>
                                </div>
                        </div>

                        <h6 className="card-title font-italic" style={{color: '#827FFE'}}><i className="fas fa-user"></i> Information Etulisateur :</h6>
                        <div className="form-group row">
                            <label htmlFor="email" className="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div className="col-md-6">
                                <input id="email" style={{background: '#F8F9FA'}} type="email" name="email" className="form-control" value={this.state.value2} onChange={this.onChangeValue} />
                                <p style={{color: 'red'}}>{this.validator.message('email', this.state.email, 'required|email')}</p>
                            </div>
                        </div>
                                        
                        <div className="form-group row">
                            <label htmlFor="password" className="col-md-4 col-form-label text-md-right">Password</label>
                            <div className="col-md-6">
                                <input id="password" style={{background: '#F8F9FA'}} type="password" className="form-control" name="password" value={this.state.value3} onChange={this.onChangeValue} />
                                {this.validator.message('password', this.state.password, 'required|between:8,255')}

                            </div>
                        </div>
                                        
                        <div className="form-group row">
                            <label htmlFor="password-confirm"  className="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div className="col-md-6">
                                <input id="password-confirm" style={{background: '#F8F9FA'}} className="form-control" type="password" className="form-control" name="password_confirmation" value={this.state.value4} onChange={this.onChangeValue} />
                                {(this.state.password == this.state.password_confirmation) || <p style={{color: 'red'}}>Password dont match</p> }
                            </div>
                        </div>
                    

                        {/* <div className="col-md-6">
                            <input id="file" type="file" accept="image/x-png,image/gif,image/jpeg" name="file" onChange={this.onChangeValueX} /> */}
                            {/* <input id="file" type="file" inputProps={{ accept: 'image/*' }} name="file" onChange={this.onChangeValueX} /> */}
                            {/* {this.state.y} */}
                        {/* </div> */}
                        <footer className="blockquote-footer">Each patient carries his own doctor inside him.  <cite title="Source Title">Norman Cousins</cite></footer>
                        {this.state.errorMessage && <p style={{color: 'red'}} className="error">Ops !One of the following is already used :<br></br><strong>Email - Tel - INP</strong></p> }
                        {/* <div class="form-group row mb-0"> */}
                            {/* <div class="col-md-8 offset-md-4"> */}
                                <button className="btn" style={{background: '#827FFE' , color: 'white'}}><i className="fas fa-user-plus"></i> Submit</button>
                            {/* </div> */}
                        {/* </div> */}
                    </form>
               </div>
        );
    }
}

if (document.getElementById('mr')) {
    var data = document.getElementById(('mr')).getAttribute('data');
    ReactDOM.render(<MedcineRegister data={data}/>, document.getElementById('mr'));
}