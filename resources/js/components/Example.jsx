import React from 'react';
import ReactDOM from 'react-dom/client';

function Example() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda accusamus quae obcaecati mollitia officiis voluptatibus numquam corporis accusantium enim odit debitis natus quas dolor est rerum totam, nulla ex repellendus!</p>
                        <div className="card-body">I'm an example component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    const Index = ReactDOM.createRoot(document.getElementById("example"));

    Index.render(
        <React.StrictMode>
            <Example />
        </React.StrictMode>
    )
}

