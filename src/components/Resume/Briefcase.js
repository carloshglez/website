import React from 'react';
import { getTextJoined, getFileExtension, isMobileDevice } from '../../util/helper'

export default class Briefcase extends React.Component {
    getTitle(title) {
        return (
            <h3 className="portfolio_title">{title}</h3>
        )
    }

    getAppImages(imagePath, galleryArray, title) {
        return (
            <div className="portfolio_pic col-xs-12 col-sm-5">
                <br />
                <br />
                <img className="img-responsive" src={imagePath} alt="" width="380" />
                <br />
                {this.getGalleryItems(galleryArray, title)}
            </div>
        )
    }

    getGalleryItems(galleryArray, title) {
        let galleryItems = galleryArray.map(function (item, index) {
            return (
                <a href={item[0]} className="lightview" data-lightview-group={index} data-lightview-title={title}
                    data-lightview-caption={item[1]} key={index}>
                    <img className="imgGaleria" src={item[0]} />
                </a>
            )
        });

        return galleryItems;
    }

    getSummary(textArray) {
        return (
            <p className="portfolio_description">
                {getTextJoined(textArray)}
            </p>
        )
    }

    getToolItems(toolsArray, demoArray) {
        let toolItems = toolsArray.map(function (item, index) {
            return (
                <li key={index}>{item}</li>
            )
        });

        return (
            <div className="portfolio_stack">
                <ul className="list-inline">
                    {this.getDemoItems(demoArray)}
                    {toolItems}
                </ul>
            </div>
        )
    }

    getDemoItems(demoArray) {
        let demoItems = demoArray.map(function (item, index) {
            if(isMobileDevice() && getFileExtension(item[0]) === 'jar') {
                return null;
            } else {
                return (
                    <li key={index}><b><a href={item[0]} target="_blank">{item[1]}</a></b></li>
                )
            }
        });

        return demoItems;
    }

    getAppBlocks(topic, tag) {
        let blockItems = topic.map(function (item, index) {
            return (
                <div className="item row   js-portfolio-item" data-portfolio-tag={tag} key={index}>
                    <div className="item__bg"></div>
                    {this.getAppImages(item.image, item.gallery, item.title)}
                    <div className="portfolio_details col-xs-12 col-sm-6">
                        {this.getTitle(item.title)}
                        {this.getSummary(item.summary)}
                        {this.getToolItems(item.tools, item.demoUrl)}
                    </div>
                </div>
            )
        }.bind(this));

        return blockItems;
    }

    render() {
        let briefcase = this.props.briefcase;
        let profession = this.props.briefcase.topics.profession;
        let academic = this.props.briefcase.topics.academic;
        let personal = this.props.briefcase.topics.personal;

        return (
            <section id="portfolio" className="portfolio_block">
                <div className="container">
                    <div className="row">
                        <div className="col-xs-12">
                            <h2 id="portfolio_header" className="text-center">{briefcase.title}</h2>
                            <div className="portfolio_menu row">
                                <div className="col-xs-12">
                                    <ul className="list-inline list-unstyled">
                                        <li>
                                            <a href="#" data-portfolio-target-tag="profesional">Profesional</a>
                                        </li>
                                        <li>
                                            <a href="#" data-portfolio-target-tag="academico">Académico</a>
                                        </li>
                                        <li>
                                            <a href="#" data-portfolio-target-tag="personal">Personales</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div className="portfolio_items">
                                {this.getAppBlocks(profession, 'profesional')}
                                {this.getAppBlocks(academic, 'academico')}
                                {this.getAppBlocks(personal, 'personal')}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        );
    }
}
