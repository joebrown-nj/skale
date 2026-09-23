<?php

declare(strict_types=1);

use App\Models\Entities\PortfolioEntity;
use App\Models\Entities\TestimonialEntity;
use PHPUnit\Framework\TestCase;

final class TestimonialEntityTest extends TestCase
{
    public function testItStoresShortText(): void
    {
        $testimonial = (new TestimonialEntity())->setShortText('A concise testimonial summary.');

        $this->assertSame('A concise testimonial summary.', $testimonial->getShortText());
    }

    public function testItManagesProjectAndTestimonialRelationships(): void
    {
        $testimonial = new TestimonialEntity();
        $project = new PortfolioEntity();
        $related = new TestimonialEntity();

        $testimonial->addProject($project)->addProject($project);
        $testimonial->addRelatedTestimonial($related)->addRelatedTestimonial($testimonial);

        $this->assertCount(1, $testimonial->getProjects());
        $this->assertTrue($project->getTestimonials()->contains($testimonial));
        $this->assertCount(1, $testimonial->getRelatedTestimonials());

        $testimonial->removeProject($project);
        $this->assertFalse($project->getTestimonials()->contains($testimonial));
    }

    public function testRatingMustBeBetweenOneAndFive(): void
    {
        $this->expectException(InvalidArgumentException::class);
        (new TestimonialEntity())->setRating(6);
    }
}
