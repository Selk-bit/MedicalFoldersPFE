import React from 'react';
import ReactDOM from 'react-dom';

function Nav() {
    return (
        <div>
            <div className="layer" />
                <div id="preloader">
                    <div data-loader="circle-side" />
                </div>
            <header className="header_sticky">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-3 col-6">
                            <div id="logo_home">
                                <h1><a href="/" title="pfe" /></h1>
                            </div>
                        </div>
                    <nav className="col-lg-9 col-6">
                        <a className="cmn-toggle-switch cmn-toggle-switch__htx open_close" href><span>Menu mobile</span></a>
                        <ul id="top_access">
                            <li style={{color: '#19224E'}}><i className="fas fa-globe-europe" /></li>
                        </ul>
                        <div className="main-menu">
                        <ul>
                            <li className="submenu">
                                <a href="/" style={{color: 'rgb(51,51,51)'}} className="show-submenu">Home&nbsp;&nbsp;&nbsp;&nbsp;</a>
                            </li>
                            <li className="submenu">
                                <a href className="show-submenu" style={{color: 'rgb(51,51,51)'}}>Authentification<i className="icon-down-open-mini">&nbsp;&nbsp;&nbsp;&nbsp;</i></a>
                            <ul>
                                <li className="third-level"><a href>Register</a>
                                <ul>
                                    <li><a href="/medcine/register">Médecin </a></li>
                                    <li><a href="/patient/register">Patient</a></li>
                                </ul>
                                </li>
                                <li className="third-level" style={{color: 'rgb(51,51,51)'}}><a href>Login</a>
                                <ul>
                                    <li><a href="/medcine/login">Médecin </a></li>
                                    <li><a href="/patient/login">Patient</a></li>
                                </ul>
                                </li>
                            </ul>
                            </li>
                            <li><a href="#">Pourquoi Nous Choisir&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                        </ul>
                        </div>
                    </nav>
                    </div>
                </div>
            </header>
        </div>
    );
}

export default Nav;

if (document.getElementById('nav')) {
    ReactDOM.render(<Nav />, document.getElementById('nav'));
}

