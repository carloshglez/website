import React from 'react';

export default class JobsInfo extends React.Component {
    render() {
        let jobsArray = this.props.profession.content;
        let cvBlocks = jobsArray.map(function (item, index) {
            let summary = item.summary.map(function (subItem, subIndex) {
                return (
                    <li key={subIndex}>{subItem}</li>
                )
            });

            return (
                <div className="cv-block" key={index}>
                    <h4 className="cv-block__header">{item.company}</h4>
                    <p className="dates">{item.startDate} - {item.endDate}</p>
                    <lu>{summary}</lu>
                </div>
            )
        });

        return (
            <div className="jobs-info col-xs-8 col-xs-offset-2">
                <h3 id="experiencia" className="resume-subheader resume-subheader--jobs">{this.props.profession.title}</h3>
                {cvBlocks}
            </div>
        );
    }
}
