import React from 'react';

export default class CertificationInfo extends React.Component {
    render() {
        let certificatesArray = this.props.certificates.content;
        let cvBlocks = certificatesArray.map(function (item, index) {
            let summary = item.summary.map(function (subItem, subIndex) {
                return (
                    <li key={subIndex}>{subItem}</li>
                )
            });

            return (
                <div className="cv-block" key={index}>
                    <h4 className="cv-block__header">{item.name} </h4>
                    <p className="dates">{item.date}</p>
                    <ul>{summary}</ul>
                </div>
            )
        });

        return (
            <div className="education_info col-xs-8 col-xs-offset-2">
                <h3 id="cursos" className="resume-subheader resume-subheader--edu">{this.props.certificates.title}</h3>
                {cvBlocks}
            </div>
        );
    }
}


