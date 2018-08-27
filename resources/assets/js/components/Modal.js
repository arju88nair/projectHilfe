import React from 'react';
import PropTypes from 'prop-types';
import {withStyles} from '@material-ui/core/styles';
import Typography from '@material-ui/core/Typography';
import Modal from '@material-ui/core/Modal';
import Button from '@material-ui/core/Button';
import Icon from '@material-ui/core/Icon';
import {ValidatorForm, TextValidator} from 'react-material-ui-form-validator';


function getModalStyle() {
    const top = 50;
    const left = 50;

    return {
        top: `${top}%`,
        left: `${left}%`,
        transform: `translate(-${top}%, -${left}%)`,
    };
}


const styles = theme => ({
    paper: {
        position: 'absolute',
        width: theme.spacing.unit * 50,
        backgroundColor: theme.palette.background.paper,
        boxShadow: theme.shadows[5],
        padding: theme.spacing.unit * 4,
    },
    input: {
        margin: theme.spacing.unit,
        width: theme.spacing.unit * 40
    },
    addIcon: {
        left: '20%',
        fontSize: '22px'

    },
});

class UrlModal extends React.Component {
    constructor(props) {
        super(props);


        this.state = {
            open: false,
            user: '',
            button: true,
            url: '',
        };
        this.handleClose = this.handleClose.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        this.validatorListener = this.validatorListener.bind(this);


    }

    handleClose = () => {
        this.setState({open: false});
    };

    handleChange = (event) => {
        const url = event.target.value;
        console.log(this.state)
        if (this.state.validate) {
            this.setState({button: true});
        }
        this.setState({url});
    }

    handleSubmit = () => {
        this.setState({open: true});
    };

    componentDidMount() {
        // custom rule will have name 'isPasswordMatch'
        ValidatorForm.addValidationRule('isURL', (value) => {
            if (value.match(/https\:\/\/github\.com/)) {
                return true;
            }
            return false;

        });
    }


    validatorListener(result) {
        console.log(result);
        this.setState({button: false});
    }


    render() {
        const {classes} = this.props;
        const {url} = this.state;
        return (
            <div>

                <Modal
                    aria-labelledby="URL modal"
                    aria-describedby="Says so in the label"
                    open={this.props.open}
                    onClose={this.handleClose}
                >
                    <div style={getModalStyle()} className={classes.paper}>
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
                        <UrlModalWrapped/>
                    </div>

                </Modal>
            </div>
        );
    }
}


// We need an intermediary variable for handling the recursive nesting.
const  UrlModalWrapped = withStyles(styles)(UrlModal);

export default UrlModalWrapped;
