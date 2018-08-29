import React, {Component} from 'react';
import '../../../../public/css/login.css';
import MainTab from './Tabs'
// import UrlModal from './Modal'
import ErrorBoundary from './ErrorBoundary'
import FormDialog from "./Modal";
import Button from '@material-ui/core/Button';
import TextField from '@material-ui/core/TextField';
import Dialog from '@material-ui/core/Dialog';
import DialogActions from '@material-ui/core/DialogActions';
import DialogContent from '@material-ui/core/DialogContent';
import DialogContentText from '@material-ui/core/DialogContentText';
import DialogTitle from '@material-ui/core/DialogTitle';

class ProfileBanner extends Component {


    constructor(props, context) {
        super(props, context);


        this.state = {
            profile: [],
            isLoading: false,
            open: false,
            show: false,

        };
        this.toggleModal= this.toggleModal.bind(this);
        this.handleClose= this.handleClose.bind(this);

    }


    handleClose() {
        this.setState({
            open: !this.state.open
        });
    }


    toggleModal() {
        this.setState({
            open: true
        });
    }

    componentDidMount() {
        let nickObj = {nickname};
        let nick = nickObj.nickname;
        this.setState({isLoading: true});
        /* fetch API in action */
        fetch('https://api.github.com/users/' + nickname)
            .then(response => {
                return response.json();
            })
            .then(profile => {
                //Fetched data is stored in the state
                this.setState({profile, isLoading: false});
            });
    }

    render() {
        if (this.state.isLoading) {
            return <div className="loaderCard">
                <div className="loader">
                    <div className="line"/>
                    <div className="line"/>
                    <div className="line"/>
                    <div className="line"/>
                </div>
            </div>;
        }
        return (

            <div>
                <div className="card-body d-flex justify-content-center">
                    <div className="col-md-8">
                        <div className="circle">
                            <img
                                src={this.state.profile.avatar_url}
                                className="image--cover"/>
                        </div>
                        <div className="rectangle col-md-12 d-flex justify-content-end">
                            <div className="col-md-10 badgeContent">
                                <div className="badgeContentFirst ">
                                    <span> <b>{this.state.profile.name}</b> aka <b>{this.state.profile.login}</b></span>
                                    <span><a href={this.state.profile.html_url}><i
                                        className="fab fa-github"/></a></span><br/>
                                    <p className="bio">{this.state.profile.bio}</p>
                                </div>
                                <div className="badgeContentSecond">
                                    <span><i className="fab fa-git-square"/>&nbsp; {this.state.profile.public_repos}</span>
                                    <span><i className="fas fa-location-arrow"/>&nbsp; {this.state.profile.location}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <i className="fas fa-plus-circle addPlus" onClick={this.toggleModal}/>
                    <ErrorBoundary>  <FormDialog open={this.state.open} handleClose={this.handleClose} /></ErrorBoundary>

                </div>
                <div className="d-flex justify-content-center">

                </div>
                <div>
                    <MainTab/>
                </div>
            </div>

        );
    }
}

export default ProfileBanner;

