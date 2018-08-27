import React, {Component} from 'react';
import PropTypes from 'prop-types';
import { withStyles } from '@material-ui/core/styles';
import Paper from '@material-ui/core/Paper';
import Tabs from '@material-ui/core/Tabs';
import Tab from '@material-ui/core/Tab';
import Typography from '@material-ui/core/Typography';
import RepoList from './repoList'


const TabContainer = (props) => {
    return (
        <Typography component="div" style={{ padding: 8 * 3 }}>
            {props.children}
        </Typography>
    );
}

TabContainer.propTypes = {
    children: PropTypes.node.isRequired,
};


class MainTab extends Component {
    constructor(props)
    {
        super(props);
       this. state = {
            value: 1,
        };

    }

    handleChange = (event, value) => {
        this.setState({ value });
    };

    render() {

        const pStyle = {
            flexGrow: 1,
        };
        const { value } = this.state;

        return (
            <Paper style={pStyle}>
                <Tabs
                    value={this.state.value}
                    onChange={this.handleChange}
                    indicatorColor="primary"
                    textColor="primary"
                    centered
                >
                    <Tab label="Top Repos" />
                    <Tab label="Your repos" />
                </Tabs>
                {value === 0 && <TabContainer>                        <RepoList typeOfCall={"getHomeRepos"}/>
                </TabContainer>}
                {value === 1 && <TabContainer>                        <RepoList typeOfCall={"getHomeRepos"}/>
                </TabContainer>}
            </Paper>

        );
    }
}

export default MainTab;
