//
//  BandDetailedView.m
//  Stage
//
//  Created by Joubin Jabbari on 12/23/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import "BandDetailedView.h"

@implementation BandDetailedView{
    CGRect m_frame;
    NSObject *m_info;
}

-(id) initWithFrame:(CGRect)frame withObjectInfo:(NSObject *)info{
    self = [super initWithFrame:frame];
    m_frame = frame;
    m_info = info;
    if (self) {
        [self setUpBaseView];
    }
    return self;
}

-(void) touchesBegan:(NSSet *)touches withEvent:(UIEvent *)event{
    [self removeFromSuperview];
}


-(void) setUpBaseView{
    UIView *smallView =  [[UIView alloc] initWithFrame:CGRectMake(0, 0, m_frame.size.width, 150)];
    smallView.backgroundColor = (UIColor *) m_info;
    
}
@end
