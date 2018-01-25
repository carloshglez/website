import React from 'react';

export default class EducationInfo extends React.Component {
    render() {
        let educationArray = this.props.education.content;
        let cvBlocks = educationArray.map(function (item, index) {
            let achievements = item.achievement.map(function (subItem, subIndex) {
                return (
                    <li key={subIndex}>{subItem}</li>
                )
            });

            return (
                <div className="cv-block" key={index}>
                    <h4 className="cv-block__header">{item.degree} </h4>
                    <p className="dates">{item.startDate} - {item.endDate}</p>
                    <p>{item.school}</p>
                    <ul>{achievements}</ul>
                </div>
            )
        });

        return (
            <div className="education_info col-xs-8 col-xs-offset-2">
                <h3 className="resume-subheader resume-subheader--edu">{this.props.education.title}</h3>
                {cvBlocks}
            </div>
        );
    }
}
