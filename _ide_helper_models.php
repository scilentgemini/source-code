<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $image
 * @property string $video_url
 * @property string $description
 * @property string $button_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs query()
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereButtonUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereVideoUrl($value)
 */
	class AboutUs extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $icon
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Amenity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Amenity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Amenity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Amenity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amenity whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amenity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amenity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amenity whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amenity whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amenity whereUpdatedAt($value)
 */
	class Amenity extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BannerImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BannerImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BannerImage query()
 */
	class BannerImage extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $image
 * @property int $author_id
 * @property int $blog_category_id
 * @property int $views
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property int $is_popular
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $author
 * @property-read \App\Models\BlogCategory $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BlogComment> $comments
 * @property-read int|null $comments_count
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereBlogCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereIsPopular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereViews($value)
 */
	class Blog extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Blog> $blogs
 * @property-read int|null $blogs_count
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereUpdatedAt($value)
 */
	class BlogCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $blog_id
 * @property string $comment
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Blog $blog
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereBlogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogComment whereUserId($value)
 */
	class BlogComment extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $image_icon
 * @property string $background_image
 * @property int $show_at_home
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Listing> $listings
 * @property-read int|null $listings_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereBackgroundImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImageIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereShowAtHome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $listing_id
 * @property int $sender_id
 * @property int $receiver_id
 * @property string $message
 * @property int $seen
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Listing|null $listingProfile
 * @property-read \App\Models\User|null $receiverProfile
 * @property-read \App\Models\User|null $senderProfile
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereReceiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereSeen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereUpdatedAt($value)
 */
	class Chat extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $listing_id
 * @property string $name
 * @property string $email
 * @property string $claim
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Listing $listing
 * @method static \Illuminate\Database\Eloquent\Builder|Claim newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Claim newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Claim query()
 * @method static \Illuminate\Database\Eloquent\Builder|Claim whereClaim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Claim whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Claim whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Claim whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Claim whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Claim whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Claim whereUpdatedAt($value)
 */
	class Claim extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $map_link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereMapLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $background
 * @property int|null $counter_one
 * @property string|null $counter_title_one
 * @property int|null $counter_two
 * @property string|null $counter_title_two
 * @property int|null $counter_three
 * @property string|null $counter_title_three
 * @property int|null $counter_four
 * @property string|null $counter_title_four
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Counter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Counter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Counter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Counter whereBackground($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Counter whereCounterFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Counter whereCounterOne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Counter whereCounterThree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Counter whereCounterTitleFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Counter whereCounterTitleOne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Counter whereCounterTitleThree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Counter whereCounterTitleTwo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Counter whereCounterTwo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Counter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Counter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Counter whereUpdatedAt($value)
 */
	class Counter extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $short_description
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $copyright
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FooterInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FooterInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FooterInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|FooterInfo whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterInfo whereCopyright($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterInfo whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterInfo wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterInfo whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterInfo whereUpdatedAt($value)
 */
	class FooterInfo extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $background
 * @property string $title
 * @property string $sub_title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Hero newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hero newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hero query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hero whereBackground($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hero whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hero whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hero whereSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hero whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hero whereUpdatedAt($value)
 */
	class Hero extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property int|null $location_id
 * @property int|null $package_id
 * @property string $image
 * @property string $thumbnail_image
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $address
 * @property string|null $website
 * @property string|null $facebook_link
 * @property string|null $x_link
 * @property string|null $linkedin_link
 * @property string|null $whatsapp_link
 * @property int $is_verified
 * @property int $is_featured
 * @property int $views
 * @property string|null $google_map_embed_code
 * @property string|null $file
 * @property string $expire_date
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property int $status
 * @property int $is_approved
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ListingAmenity> $amenities
 * @property-read int|null $amenities_count
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ListingImageGallery> $gallery
 * @property-read int|null $gallery_count
 * @property-read \App\Models\Location|null $location
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ListingSchedule> $schedules
 * @property-read int|null $schedules_count
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ListingVideoGallery> $videoGallery
 * @property-read int|null $video_gallery_count
 * @method static \Illuminate\Database\Eloquent\Builder|Listing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Listing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Listing onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Listing query()
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereFacebookLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereGoogleMapEmbedCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereIsVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereLinkedinLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereThumbnailImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereWhatsappLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereXLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Listing withoutTrashed()
 */
	class Listing extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $listing_id
 * @property int $amenity_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Amenity|null $amenity
 * @method static \Illuminate\Database\Eloquent\Builder|ListingAmenity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListingAmenity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListingAmenity query()
 * @method static \Illuminate\Database\Eloquent\Builder|ListingAmenity whereAmenityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingAmenity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingAmenity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingAmenity whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingAmenity whereUpdatedAt($value)
 */
	class ListingAmenity extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $listing_id
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ListingImageGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListingImageGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListingImageGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|ListingImageGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingImageGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingImageGallery whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingImageGallery whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingImageGallery whereUpdatedAt($value)
 */
	class ListingImageGallery extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $listing_id
 * @property string $day
 * @property string $start_time
 * @property string $end_time
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ListingSchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListingSchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListingSchedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|ListingSchedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingSchedule whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingSchedule whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingSchedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingSchedule whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingSchedule whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingSchedule whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingSchedule whereUpdatedAt($value)
 */
	class ListingSchedule extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $listing_id
 * @property string $video_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ListingVideoGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListingVideoGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListingVideoGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|ListingVideoGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingVideoGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingVideoGallery whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingVideoGallery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListingVideoGallery whereVideoUrl($value)
 */
	class ListingVideoGallery extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $show_at_home
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Listing> $listings
 * @property-read int|null $listings_count
 * @method static \Illuminate\Database\Eloquent\Builder|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereShowAtHome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereUpdatedAt($value)
 */
	class Location extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $order_id
 * @property string $transaction_id
 * @property int $user_id
 * @property int $package_id
 * @property string $payment_method
 * @property string $payment_status
 * @property float $base_amount
 * @property string $base_currency
 * @property float $paid_amount
 * @property string $paid_currency
 * @property string $purchase_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Package $package
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBaseAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBaseCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaidAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaidCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePurchaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $icon
 * @property string $title
 * @property string $short_description
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OurFeature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OurFeature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OurFeature query()
 * @method static \Illuminate\Database\Eloquent\Builder|OurFeature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OurFeature whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OurFeature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OurFeature whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OurFeature whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OurFeature whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OurFeature whereUpdatedAt($value)
 */
	class OurFeature extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property float $price
 * @property int $number_of_days
 * @property int $num_of_listing
 * @property int $num_of_photos
 * @property int $num_of_video
 * @property int $num_of_amenities
 * @property int $num_of_featured_listing
 * @property int $show_at_home
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Package newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Package query()
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereNumOfAmenities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereNumOfFeaturedListing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereNumOfListing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereNumOfPhotos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereNumOfVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereNumberOfDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereShowAtHome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Package withoutTrashed()
 */
	class Package extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSetting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSetting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentSetting whereValue($value)
 */
	class PaymentSetting extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PrivacyPolicy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrivacyPolicy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrivacyPolicy query()
 * @method static \Illuminate\Database\Eloquent\Builder|PrivacyPolicy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrivacyPolicy whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrivacyPolicy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrivacyPolicy whereUpdatedAt($value)
 */
	class PrivacyPolicy extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $listing_id
 * @property int $user_id
 * @property int $rating
 * @property string $review
 * @property int $is_approved
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Listing $listing
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUserId($value)
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $our_feature_title
 * @property string|null $our_feature_sub_title
 * @property string|null $our_categories_title
 * @property string|null $our_categories_sub_title
 * @property string|null $our_location_title
 * @property string|null $our_location_sub_title
 * @property string|null $our_featured_listing_title
 * @property string|null $our_featured_listing_sub_title
 * @property string|null $our_our_pricing_title
 * @property string|null $our_our_pricing_sub_title
 * @property string|null $our_testimonial_title
 * @property string|null $our_testimonial_sub_title
 * @property string|null $our_blog_title
 * @property string|null $our_blog_sub_title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle query()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle whereOurBlogSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle whereOurBlogTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle whereOurCategoriesSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle whereOurCategoriesTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle whereOurFeatureSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle whereOurFeatureTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle whereOurFeaturedListingSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle whereOurFeaturedListingTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle whereOurLocationSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle whereOurLocationTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle whereOurOurPricingSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle whereOurOurPricingTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle whereOurTestimonialSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle whereOurTestimonialTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionTitle whereUpdatedAt($value)
 */
	class SectionTitle extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $icon
 * @property string $url
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SocialLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialLink whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialLink whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialLink whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialLink whereUrl($value)
 */
	class SocialLink extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $package_id
 * @property int $order_id
 * @property string $purchase_date
 * @property string|null $expire_date
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Package|null $package
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription wherePurchaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUserId($value)
 */
	class Subscription extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TermsAndCondition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TermsAndCondition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TermsAndCondition query()
 * @method static \Illuminate\Database\Eloquent\Builder|TermsAndCondition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TermsAndCondition whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TermsAndCondition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TermsAndCondition whereUpdatedAt($value)
 */
	class TermsAndCondition extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $image
 * @property string $name
 * @property string $title
 * @property int $rating
 * @property string $review
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial query()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereUpdatedAt($value)
 */
	class Testimonial extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $user_type
 * @property string $avatar
 * @property string $banner
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $about
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $website
 * @property string|null $fb_link
 * @property string|null $x_link
 * @property string|null $in_link
 * @property string|null $wa_link
 * @property string|null $instra_link
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \App\Models\Subscription|null $subscription
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFbLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereInLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereInstraLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWaLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereXLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

