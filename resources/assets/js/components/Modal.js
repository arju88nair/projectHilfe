import React from 'react';
import Button from '@material-ui/core/Button';
import TextField from '@material-ui/core/TextField';
import Dialog from '@material-ui/core/Dialog';
import DialogActions from '@material-ui/core/DialogActions';
import DialogContent from '@material-ui/core/DialogContent';
import DialogContentText from '@material-ui/core/DialogContentText';
import DialogTitle from '@material-ui/core/DialogTitle';
import Icon from '@material-ui/core/Icon';
import {ValidatorForm, TextValidator} from 'react-material-ui-form-validator';

export default class FormDialog extends React.Component {
    constructor(props, context) {
        super(props, context);


        this.state = {
            open: false,


        };
        this.handleClose=this.handleClose.bind(this)
    }




    handleClose() {
        this.props.handleClose();
    }

    render() {
        const open = this.props.open;

        return (
            <div>
                <Dialog
                    open={open}
                    onClick={this.handleClose}
                    aria-labelledby="form-dialog-title"
                >
                    <DialogTitle id="form-dialog-title">Subscribe</DialogTitle>
                    <DialogContent>
                        <DialogContentText>
                            To subscribe to this website, please enter your email address here. We will send
                            updates occasionally.
                        </DialogContentText>
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

                            />
                            <Button variant="fab" mini color="primary" aria-label="Add" className={classes.addIcon}
                                    disabled={this.state.button}>
                                <Icon className={classes.addIcon}>send</Icon>
                            </Button>
                        </ValidatorForm>
                    </DialogContent>
                    <DialogActions>
                        <Button onClick={this.handleClose} color="primary">
                            Cancel
                        </Button>
                        <Button onClick={this.handleClose} color="primary">
                            Subscribe
                        </Button>
                    </DialogActions>
                </Dialog>
            </div>
        );
    }
}
