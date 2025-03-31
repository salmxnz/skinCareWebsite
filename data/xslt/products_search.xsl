<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <div class="search-results">
            <h3>Search Results</h3>
            <xsl:choose>
                <xsl:when test="count(products/Product) > 0">
                    <div class="row">
                        <xsl:for-each select="products/Product">
                            <div class="col-md-4 col-sm-6 product-card">
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="details.php?id={Id}">
                                            <img src="{Image}" alt="{Name}" class="img-responsive" />
                                        </a>
                                        <xsl:if test="IsNew = 'true'">
                                            <div class="product-label">
                                                <span class="new">New</span>
                                            </div>
                                        </xsl:if>
                                        <xsl:if test="IsBest = 'true'">
                                            <div class="product-label">
                                                <span class="best">Best Seller</span>
                                            </div>
                                        </xsl:if>
                                    </div>
                                    <div class="product-info">
                                        <h4 class="product-title">
                                            <a href="details.php?id={Id}">
                                                <xsl:value-of select="Name" />
                                            </a>
                                        </h4>
                                        <div class="product-category">
                                            <xsl:value-of select="Category" />
                                        </div>
                                        <div class="product-price">
                                            <xsl:choose>
                                                <xsl:when test="DiscountPrice != ''">
                                                    <span class="original-price">$<xsl:value-of select="Price" /></span>
                                                    <span class="discount-price">$<xsl:value-of select="DiscountPrice" /></span>
                                                </xsl:when>
                                                <xsl:otherwise>
                                                    <span class="price">$<xsl:value-of select="Price" /></span>
                                                </xsl:otherwise>
                                            </xsl:choose>
                                        </div>
                                        <div class="product-description">
                                            <xsl:value-of select="substring(Description, 1, 100)" />
                                            <xsl:if test="string-length(Description) > 100">...</xsl:if>
                                        </div>
                                        <div class="product-actions">
                                            <button class="btn btn-success add-to-cart" data-product-id="{Id}">
                                                Add to Cart
                                            </button>
                                            <a href="details.php?id={Id}" class="btn btn-primary">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </xsl:for-each>
                    </div>
                </xsl:when>
                <xsl:otherwise>
                    <div class="no-results">
                        <p>No products found matching your search criteria.</p>
                    </div>
                </xsl:otherwise>
            </xsl:choose>
        </div>
    </xsl:template>
</xsl:stylesheet>
