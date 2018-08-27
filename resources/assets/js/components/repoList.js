import React, {Component} from 'react';
import PropTypes from 'prop-types';
import {withStyles} from '@material-ui/core/styles';
import List from '@material-ui/core/List';
import ListItem from '@material-ui/core/ListItem';
import ListItemText from '@material-ui/core/ListItemText';
import ListItemSecondaryAction from '@material-ui/core/ListItemSecondaryAction';
import Star from '@material-ui/icons/Star';
import IconButton from '@material-ui/core/IconButton';


const styles = theme => ({
    root: {
        width: '100%',
        borderColor: '#d6d7da',
        backgroundColor: theme.palette.background.paper,
    },
});

class repoList extends Component {
    constructor(props) {
        super(props);

        this.state = {
            listingData: [],
            isMounted: false,
            isListLoading: false,
        };

    }

    callURL = () => {
        this.setState({isListLoading: true});

        this.setState({isMounted: true}, () => {
            const URL = this.props.typeOfCall;

            fetch(URL)
                .then(response => {
                    return response.json();
                })
                .then(response => {
                    setTimeout(() => {
                        this.setState({listingData: response, isListLoading: false,})
                    }, 600);

                    //Fetched data is stored in the state
                    ;
                });
        });


    }

    componentDidMount() {

        this.callURL();

    }

    render() {
        if (this.state.isListLoading) {
            return <div className="listLoaderCard">
                <div className="loader">
                    <div className="line"/>
                    <div className="line"/>
                    <div className="line"/>
                    <div className="line"/>
                </div>
            </div>;
        }
        else {


            const {classes} = this.props;
            return (
                <div className={classes.root}>
                    {this.state.listingData.map(item => {
                        return <List className="mataerialList" key={item._id}>
                            <ListItem button key={item._id}>
                                <ListItemText primary={item.title} secondary={item.summary} key={item._id}/>
                                <ListItemSecondaryAction key={item._id}>
                                </ListItemSecondaryAction>
                            </ListItem>
                        </List>;
                    })
                    }

                </div>
            );
        }
    }

}

// function repoList(props) {
//     const {classes} = props;
//     return (
//         <div className={classes.root}>
//             <List component="nav">
//                 <ListItem button>
//                     <ListItemIcon>
//                         <InboxIcon/>
//                     </ListItemIcon>
//                     <ListItemText primary="Inbox"/>
//                 </ListItem>
//                 <ListItem button>
//                     <ListItemIcon>
//                         <DraftsIcon/>
//                     </ListItemIcon>
//                     <ListItemText primary="Drafts"/>
//                 </ListItem>
//             </List>
//             <Divider/>
//             <List component="nav">
//                 <ListItem button>
//                     <ListItemText primary="Trash"/>
//                 </ListItem>
//                 <ListItem button component="a" href="#simple-list">
//                     <ListItemText primary="Spam"/>
//                 </ListItem>
//             </List>
//         </div>
//     );
// }

repoList.propTypes = {
    classes: PropTypes.object.isRequired,
};

export default withStyles(styles)(repoList);
