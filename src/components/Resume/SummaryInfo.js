import React from 'react';
import { getTextJoined } from '../../util/helper'

export default class SummaryInfo extends React.Component {
    render() {
        return (
            <div>
                <h2 id="resume_header" className="text-center">{this.props.career.title}</h2>
                <div className="row">
                    <div className="col-xs-10 col-xs-offset-1">
                        <p className="employment_and_edu_block__heading-text">
                            {getTextJoined(this.props.career.content)}
                        </p>
                    </div>
                </div>
            </div>
        );
    }
}
