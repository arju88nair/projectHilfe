/**
 * Copyright (C) Covalense Technologies - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by nar, 19/8/18 8:54 PM
 */
import React, {Component} from 'react';

export default class loader extends Component {

    render() {

        return <div className="listLoaderCard">
            <div className="loader">
                <div className="line"/>
                <div className="line"/>
                <div className="line"/>
                <div className="line"/>
            </div>
        </div>;
    }
}