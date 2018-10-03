import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import ProfileBanner from './ProfileBanner'


        /* The if statement is required so as to Render the component on pages that have a div with an ID of "root";
        */

    if (document.getElementById('profile')) {
        ReactDOM.render(<ProfileBanner/>, document.getElementById('profile'));
    }