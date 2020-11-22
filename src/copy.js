//import ReactDOM from 'react-dom';
//import React from 'react';
class Social extends React.Component {
    render() {
    return  <ul className="copy">
                <li className="fb"><a href="#"><i className="fa fa-facebook fa-2x"></i></a></li>
            </ul>
    }
}
function MyCopy() {
    return (
        <div className="copy-wrap">
            <Social />
        </div>
    );
}
ReactDOM.render(<MyCopy />,document.getElementById('copy'));