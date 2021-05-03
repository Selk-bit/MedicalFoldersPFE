// import React from 'react';
// import ReactDOM from 'react-dom';

// function Example() {
//     return (
//         <div className="container">
//             <div className="row justify-content-center">
//                 <div className="col-md-8">
//                     <div className="card">
//                         <div className="card-header">Example Component</div>

//                         <div className="card-body">I'm an example component!</div>
//                     </div>
//                 </div>
//             </div>
//         </div>
//     );
// }

// export default Example;

// if (document.getElementById('example')) {
//     ReactDOM.render(<Example />, document.getElementById('example'));
// }


import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

import SimpleReactValidator from 'simple-react-validator';

export default class MedcineRegister extends Component
{
    constructor(props)
    {
        super(props);
        this.validator = new SimpleReactValidator();
        this.state = {
            json:JSON.parse(props.data),//data received from a laravel controller used to implement the select/option menu down below.
            email: '',
            Specialite: '1',//initialization
            image: '',
            toRender: ''
        };

        this.onChangeValueX = this.onChangeValueX.bind(this);
        this.onChangeValue = this.onChangeValue.bind(this);
        this.onSubmitButton = this.onSubmitButton.bind(this);
    }

    onChangeValue(e) {
        this.setState({
            [e.target.name]: e.target.value,
        });
    }

    onChangeValueX(e) {
        this.setState({
            image: e.target.files[0]
        });
        // console.log(e.target.files)//i Should see array on one image but it shows :
        // console.log(e.target.files[0])//i should see my image but it shows :
    }

    async onSubmitButton(e) {
        e.preventDefault();
        if (this.validator.allValid()) {
            const formData = new FormData();
            formData.append("email", this.state.email);
            formData.append("Specialite", this.state.Specialite);
            formData.append("image", this.state.image);
            axios.defaults.validateStatus = () => true;
            const response = await axios.post("/medcine/registerR", formData, {
            headers: {
            "Content-Type": "multipart/form-data"
            }
            })
            .catch(err => {
            this.setState({
                loading: false,
                error: err,
                toRender: response.data.errors.email[0]
                });
                });;
                console.log(response.data);
                console.log("errors.email ::" + response.data.errors.email);//The email has already been taken.
                console.log(response.data.errors.email[0]);//The email has already been taken.            
                console.log(response.data.errors.image[0]);//The image must be an image.
            
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
          <div className="container">
              <div className="card-body">                             
                     <form encType="multipart/form-data" onSubmit={this.onSubmitButton}>
                                        
                        <div className="form-group row">
                            <label htmlFor="email" className="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div className="col-md-6">
                                <input id="email" type="email" name="email" value={this.state.value2} onChange={this.onChangeValue} required/>
                                {this.validator.message('email', this.state.email, 'required|email')}
                                {this.state.date.toLocaleTimeString()}
                                {/* { this.state.errorMessage && <h3 className="error"> { this.state.errorMessage } </h3> }} */}
                                {/* {this.state.response.data.errors.email[0]} */}
                                
                            </div>
                        </div>
                                        
                        <div className="form-group row">
                            <label htmlFor="nom" className="col-md-4 col-form-label text-md-right">Nom</label>
                            <div className="col-md-6">
                                <input id="nom" type="text" name="nom" value={this.state.value4} onChange={this.onChangeValue} required autoFocus />
                            </div>
                        </div>

                        <div className="col-md-6">
                               <select onChange={this.onChangeValue} name="Specialite" value={this.state.value} autoFocus>     
                                {this.state.json.map(i => (
                                    <option className="form-control" value={i.id}>{i.nom}</option>
                                    ))}
                                </select>
                        </div>

                        <div className="col-md-6">
                            <input id="file" type="file" name="file" onChange={this.onChangeValueX} autoFocus/>
                        </div>

                        <div className="form-group row mb-0">
                            <button className="btn btn-primary">Submit</button>
                        </div>
                    </form>
               </div>
          </div>
        );
    }
}

if (document.getElementById('mr')) {
    var data = document.getElementById(('mr')).getAttribute('data');
    ReactDOM.render(<MedcineRegister data={data}/>, document.getElementById('mr'));
}
