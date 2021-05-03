import React from 'react';
import ReactDOM from 'react-dom';

function Navsp() {
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
                                <h1><a/></h1>
                            </div>
                        </div>
                    <nav className="col-lg-9 col-6">
                        <ul id="top_access">
                            <li style={{color: '#19224E'}}><i className="fas fa-globe-europe" /></li>
                        </ul>
                        <div className="main-menu">
                        
                        </div>
                    </nav>
                    </div>
                </div>
            </header>
        </div>
    );
}

export default Navsp;

if (document.getElementById('navsp')) {
    ReactDOM.render(<Navsp />, document.getElementById('navsp'));
}

