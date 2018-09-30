import React, {Component} from 'react';
import Button from '@material-ui/core/Button';
import Dialog from '@material-ui/core/Dialog';
import DialogContent from '@material-ui/core/DialogContent';
import DialogTitle from '@material-ui/core/DialogTitle';
import DialogActions from '@material-ui/core/DialogActions';
import axios from 'axios';
import Icon from '@material-ui/core/Icon';
import {ValidatorForm, TextValidator} from 'react-material-ui-form-validator';
import Snackbar from '@material-ui/core/Snackbar';
import CustomizedSnackbars from './CommonSnackbar'


export default class FormDialog extends Component {
    constructor(props) {
        super(props);


        this.state = {
            open: false,
            url: '',
            button: true,
            openSnack:false,
            vertical: 'top',
            horizontal: 'center',
        };
        this.handleClose = this.handleClose.bind(this);
        this.handleChange = this.handleChange.bind(this);
        this.validatorListener = this.validatorListener.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }


    handleClose() {
        this.props.handleClose();
    }

    handleChange = event => {
        this.setState({url: event.target.value});
    };


    handleSubmit = event => {
        let URL = 'api/getRepoDetails';
        let git = this.state.url;
        axios.post(URL, {git})
            .then(res => {
                if(res.body.code == 400)
                {

                }else{

                }
                console.log(res['code']);
                console.log(res.data.code);
            }).catch(err => {
            console.log(err.body)
        })


    };


    componentDidMount() {
        // custom rule will have name 'isURL'
        ValidatorForm.addValidationRule('isURL', (value) => {
            if (value.match(/https\:\/\/github\.com/) || this.state.apiError) {
                return true;
            }
            return false;

        });
    };


    validatorListener(result) {
        if (result) {
            this.setState({button: false});

        }
        else {
            this.setState({button: true});

        }
    }


    render() {
        const open = this.props.open;
        const { vertical, horizontal, openSnack ,url} = this.state;


        return (
            <div>
                <Snackbar
                    anchorOrigin={{ vertical, horizontal }}
                    open={openSnack}
                    onClose={this.handleClose}
                    ContentProps={{
                        'aria-describedby': 'message-id',
                    }}
                    message={<span id="message-id">I love snacks</span>}
                />
                <Dialog
                    open={open}
                    onClose={this.handleClose}
                    aria-labelledby="form-dialog-title"
                >
                    <DialogTitle id="form-dialog-title">Create your space</DialogTitle>
                    <DialogContent>
                        {/*<DialogContentText>*/}
                        {/*To subscribe to this website, please enter your email address here. We will send*/}
                        {/*updates occasionally.*/}
                        {/*</DialogContentText>*/}
                        <ValidatorForm
                            ref="form"
                            onSubmit={this.handleSubmit}
                        >
                            <TextValidator
                                label="Github Repo URL"
                                onChange={this.handleChange}
                                name="url"
                                value={url}
                                validators={['isURL']}
                                errorMessages={['Enter github repo url']}
                                validatorListener={this.validatorListener}
                                className="modalForm"
                                ref={r => (this.input = r)}

                            />
                            <Button variant="fab" mini color="primary" aria-label="Add"
                                    disabled={this.state.button} onClick={this.handleSubmit}>
                                <Icon>send</Icon>
                            </Button>
                        </ValidatorForm>
                    </DialogContent>
                    <DialogActions>
                        <Button onClick={this.handleClose} color="primary">
                            Cancel
                        </Button>
                    </DialogActions>
                </Dialog>


            </div>
        );
    }
}
