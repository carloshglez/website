import React from 'react';

export default class Footer extends React.Component {
    render() {
        return (
            <footer className="footer">
                <div className="container">
                    <div>
                        <div className="row">
                            <div className="col-xs-12">
                                <p className="small text-center">
                                    <a href={this.props.legalUrl}>&copy;{this.props.legalLabel}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        );
    }
}
